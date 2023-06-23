<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['collections'] = Course::where('routine_id','!=',NULL)->get();
        return view('modules.fees.fees_index',$data);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['courses'] = Course::where('routine_id','!=',NULL)->get();
        // dd($subject);
        return response()->json([
            'status' => 200,
            'html'=> view('modules.fees.create_fees',$data)->render(),
        ]);
    }


    public function getID(Request $request, $id)
    {
        $course_sub = Course::where('student_id',$id)->pluck('subject_id')->first();
        $subject = Subject::find($course_sub);
        $fee = $subject->fees;
        $d = $subject->duration;
        // dd($fee);
        return response()->json([
            'status' => 200,
            'sub' => $course_sub,
            'amount' => $fee,
            'duration' => $d
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'student_id' => 'required',
            'subject_id' => 'required',
            'paid_date' => 'required',
            'next_fees_date' => '',
            'admission_fees' => 'required',
            'monthly_fees' => '',
            'paid_amount' => 'required',
            'duration'=> '',
            'fees_status' => 'required',
            'due_amount' => '',
            'total_amount' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
                $fees = new Fees();
                $fees->student_id = $request->student_id;
                $fees->subject_id = $request->subject_id;
                $fees->paid_date = $request->paid_date;
                $fees->admission_fees = $request->admission_fees;
                $fees->monthly_fees = $request->monthly_fees;
                $fees->total_amount = $request->total_amount;
                $fees->paid_amount = $request->paid_amount;
                $fees->fees_status = $request->fees_status;
                $fees->due_amount = $request->due_amount;
                $fees->save();
            $newDate = $request->paid_date;
            $dur = $request->duration;
            for($i = 1; $i < $dur; $i++)
            {
                $fees = new Fees();
                $fees->student_id = $request->student_id;
                $fees->subject_id = $request->subject_id;
                $date = $newDate;
                $newDate = date('Y-m-d', strtotime($date. '+ 1 months'));
                $fees->next_fees_date  = $newDate;
                $fees->admission_fees = $request->admission_fees;
                $fees->save();
            }
           
            $data['collections'] = Course::where('routine_id','!=',NULL)->get();
            return response()->json([
                'status' => 200,
                'html' => view('modules.fees.fees_index',$data)->render(),
                'messages' => 'Fees Card Created Successfully'
            ]);
        }
    }

    public function fees_pay(Request $request, $id)
    {
        $stu_id = Fees::where('student_id',$id)->count();
        // dd($stu_id);
        if($stu_id == "0")
        {
            // dd($stu_id);
            return view('modules.fees.empty');
        }else{
            // $data['collections'] = Fees::where('student_id', $id)->where('fees_status', NULL)->orWhere('fees_status','unpaid')->get();
            return view('modules.fees.fees_card');
        }
        
    }


    public function fees_pay_create(Request $request,$id)
    {
        $fees_id = Fees::find($id);
        return response()->json([
            'status' => 200,
            'html' => view('modules.fees.payment',compact('fees_id'))->render()
        ]);
    }

    public function getCard(Request $request, $id)
    {
        $stu_id = Fees::where('student_id',$id)->count();
        // dd($stu_id);
        if($stu_id == "0")
        {
            // dd($stu_id);
            return view('modules.fees.empty');
        }else{
            $data['collections'] = Fees::where('student_id', $id)->where('fees_status', NULL)->orWhere('fees_status','unpaid')->get();
            return view('modules.fees.fees_card',$data);
        }
    }

    public function payment()
    {

    }
    /**
     * Display the specified resource.
     */
    public function show(Fees $fees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fees $fees)
    {
        //
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
