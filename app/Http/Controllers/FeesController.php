<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use App\Models\Course;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\SubjectSelect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['students']  = Fees::where('admission_fees','!=',null)->get();
        return view('modules.fees.fees_index', $data);
    }


    public function studentIndex()
    {
        $user = Auth::user()->id;
        $data['collections'] = Fees::where('student_id',$user)->get();
        return view('modules.fees.fees_card',$data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fees = Fees::all()->pluck('student_id')->count();
        if ($fees == 0) {
            $data['students'] = Student::all();
        } else {
            $fees = Fees::all()->pluck('student_id');
            foreach ($fees as $fee) {
                $data['students'] = Student::where('id', '!=', $fee)->get();
            }
        }


        // dd($students);
        // dd($subject);
        return response()->json([
            'status' => 200,
            'html' => view('modules.fees.create_fees', $data)->render(),
        ]);
    }


    public function getID(Request $request, $id)
    {
        
        $sub_count = SubjectSelect::where('student_id',$id)->count();
        
        if($sub_count == 0)
        {
            return response()->json([
                'status' => 400,
            ]);
        }else{
            $sub_id = SubjectSelect::where('student_id','=',$id)->where('status','=','active')->pluck('subject_id');
            // dd($sub_id);
            $subject = Subject::where('id','=',$sub_id)->pluck('fees');
            // dd($subject);
           
            return response()->json([
                'status' => 200,
                'sub' => $sub_id,
                'amount' => $subject,
    
            ]);
        }
        
 

        // dd($fee);
       
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'registration_date' => 'required',
            'admission_fees' => 'required',
            'paid_date'=> '',
            'admission_fees' => 'required',
            'monthly_fees' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
            'status' => 'required',
            'due_amount' => '',
            'payment_image' => ''
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $fees = new Fees();
            $newDate = $request->registration_date;
            $date = $newDate;
            $newDate = date('Y-m-d', strtotime($date. '+ 1 months'));
            $fees->next_fees_date  = $newDate;
            $fees->student_id = $request->student_id;
            $fees->registration_date = $request->registration_date;
            $fees->admission_fees = $request->admission_fees;
            $fees->paid_amount = $request->paid_amount;
            $fees->month = $request->month;
            $fees->status = $request->status;
            $fees->due_amount = $request->due_amount;
            $fees->monthly_fees = $request->monthly_fees;
            $fees->subject_id = $request->subject_id;
            $fees->paid_date = $request->registration_date;
            $fees->total_amount = $request->total_amount;
            if ($request->hasFile('payment_image')) {
                $destination = 'uploads/student/payment_image'.$fees->payment_image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('payment_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/student/payment_image', $filename);
                $fees->payment_image = $filename;
            };
            $fees->save();

            $fees = new Fees();
            $fees->student_id = $request->student_id;
            $fees->subject_id = $request->subject_id;
            $fees->monthly_fees = $request->monthly_fees;
            $newDate = $request->registration_date;
            $date = $newDate;
            $newDate = date('Y-m-d', strtotime($date. '+ 1 months'));
            $fees->paid_date  = $newDate;
            $fees->save();


            $data['students']  = Fees::where('admission_fees','!=',null)->get();
            return response()->json([
                'status' => 200,
                'html' => view('modules.fees.fees_index', $data)->render(),
                'messages' => 'Fees Card Created Successfully'
            ]);
        }
    }

    public function fees_pay(Request $request, $id)
    {
        $stu_id = Fees::where('student_id', $id)->count();
        // dd($stu_id);
        if ($stu_id == "0") {
            // dd($stu_id);
            return view('modules.fees.empty');
        } else {
            // $data['collections'] = Fees::where('student_id', $id)->where('fees_status', NULL)->orWhere('fees_status','unpaid')->get();
            return view('modules.fees.fees_card');
        }
    }


    public function fees_pay_create(Request $request, $id)
    {
        $fees_id = Fees::find($id);
        return response()->json([
            'status' => 200,
            'html' => view('modules.fees.payment', compact('fees_id'))->render()
        ]);
    }

    public function studentPay(Request $request, $id)
    {
        $fees_id = Fees::find($id);
        return response()->json([
            'status' => 200,
            'html' => view('modules.fees.payment', compact('fees_id'))->render()
        ]);
    }

    public function getCard($id)
    {
        
        $data['collections'] = Fees::where('student_id', '=', $id)->get();
        
        return view('modules.fees.fees_card', $data);
    }

    public function payment()
    {
    }
    /**
     * Display the specified resource.
     */
    public function empty()
    {
        return response()->json([
            'status' => 200,
            'html' => view('modules.fees.empty')->render()
        ]);
    }

    public function getInfo($id)
    {
        $sub_count = SubjectSelect::where('student_id',$id)->count();
        
        if($sub_count == 0)
        {
            return response()->json([
                'status' => 400,
            ]);
        }else{
            $sub_id = SubjectSelect::where('student_id','=',$id)->where('status','=','active')->pluck('subject_id');
            // dd($sub_id);
            $subject = Subject::where('id','=',$sub_id)->pluck('fees');
            // dd($subject);
           
            return response()->json([
                'status' => 200,
                'sub' => $sub_id,
                'amount' => $subject,
    
            ]);
        }
    }

    public function IdInfo(Request $request, $id)
    {
        $sub_count = SubjectSelect::where('student_id',$id)->count();
        
        if($sub_count == 0)
        {
            return response()->json([
                'status' => 400,
            ]);
        }else{
            $sub_id = SubjectSelect::where('student_id','=',$id)->where('status','=','active')->pluck('subject_id');
            // dd($sub_id);
            $subject = Subject::where('id','=',$sub_id)->pluck('fees');
            // dd($subject);
           
            return response()->json([
                'status' => 200,
                'sub' => $sub_id,
                'amount' => $subject,
    
            ]);
        }
    }

    public function feesPayment(Request $request, $id)
    {
        $fees = Fees::find($id);
       
        $validator = Validator::make($request->all(),[
            'subject_id' => 'required',
            'monthly_fees' => 'required',
            'paid_date' => 'required',
            'paid_amount' => 'required',
            'status' => 'required',
            'due_amount' => 'required',
            'student_id' => ''
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
            $newDate = $request->paid_date;
            $date = $newDate;
            $newDate = date('Y-m-d', strtotime($date. '+ 1 months'));
            $fees->next_fees_date  = $newDate;
            $fees->paid_amount = $request->paid_amount;
            $fees->month = $request->month;
            $fees->status = $request->status;
            $fees->due_amount = $request->due_amount;
            $fees->monthly_fees = $request->monthly_fees;
            $fees->subject_id = $request->subject_id;
            $fees->paid_date = $request->paid_date;
            $fees->total_amount = $request->monthly_fees;
            $fees->student_id = $request->student_id;
            if ($request->hasFile('payment_image')) {
                $destination = 'uploads/student/payment_image'.$fees->payment_image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('payment_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/student/payment_image', $filename);
                $fees->payment_image = $filename;
            };
            $fees->update();

            $fees = new Fees();
            $fees->student_id = $request->student_id;
            $fees->subject_id = $request->subject_id;
            $fees->monthly_fees = $request->monthly_fees;
            $newDate = $request->paid_date;
            $date = $newDate;
            $newDate = date('Y-m-d', strtotime($date. '+ 1 months'));
            $fees->paid_date  = $newDate;
            $fees->save();
            $data['collections'] = Fees::where('student_id', '=', $id)->get();
            return response()->json([
                'status' => 200,
                'html' => view('modules.fees.fees_card', $data)->render(),
                'messages' => 'Fees Paid Successfully'
            ]);

        }
        
    }

    public function feesPay(Request $request, $id)
    {
        $fees = Fees::find($id);
       
        $validator = Validator::make($request->all(),[
            'subject_id' => 'required',
            'monthly_fees' => 'required',
            'paid_date' => 'required',
            'paid_amount' => 'required',
            'student_id' => '',
            'status' => 'required'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
            $fees->paid_amount = $request->paid_amount;
            $fees->month = $request->month;
            $fees->monthly_fees = $request->monthly_fees;
            $fees->subject_id = $request->subject_id;
            $fees->paid_date = $request->paid_date;
            $fees->student_id = $request->student_id;
            $fees->status = $request->status;
            if ($request->hasFile('payment_image')) {
                $destination = 'uploads/student/payment_image'.$fees->payment_image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('payment_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/student/payment_image', $filename);
                $fees->payment_image = $filename;
            };
            $fees->update();

            $user = Auth::user()->id;
        $data['collections'] = Fees::where('student_id',$user)->get();
            return response()->json([
                'status' => 200,
                'html' => view('modules.fees.fees_card', $data)->render(),
                'messages' => 'Fees Paid Successfully'
            ]);

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function confirmCreate(Request $request, $id)
    {
        $fees = Fees::find($id);
        return response()->json([
            'status' => 200,
            'html' => view('modules.fees.confirm_payment',compact('fees'))->render()
        ]);
    }

    public function confirmSave(Request $request, $id)
    {
        $fees = Fees::find($id);
       
        $validator = Validator::make($request->all(),[
            'monthly_fees' => 'required',
            'paid_date' => 'required',
            'paid_amount' => 'required',
            'status' => 'required',
            'due_amount' => '',
            'student_id' => '',
            'subject_id' => ''
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
            $newDate = $request->paid_date;
            $date = $newDate;
            $newDate = date('Y-m-d', strtotime($date. '+ 1 months'));
            $fees->next_fees_date  = $newDate;
            $fees->paid_amount = $request->paid_amount;
            $fees->status = $request->status;
            $fees->due_amount = $request->due_amount;
            $fees->monthly_fees = $request->monthly_fees;
            $fees->paid_date = $request->paid_date;
            $fees->total_amount = $request->monthly_fees;
            $fees->update();

            $fees = new Fees();
            $fees->student_id = $request->student_id;
            $fees->subject_id = $request->subject_id;
            $fees->monthly_fees = $request->monthly_fees;
            $newDate = $request->paid_date;
            $date = $newDate;
            $newDate = date('Y-m-d', strtotime($date. '+ 1 months'));
            $fees->paid_date  = $newDate;
            $fees->save();
            $data['collections'] = Fees::where('student_id', '=', $id)->get();
            return response()->json([
                'status' => 200,
                'html' => view('modules.fees.fees_card', $data)->render(),
                'messages' => 'Fees Paid Successfully'
            ]);

        }
    }
 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fees $fees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fees $fees)
    {
        //
    }
}