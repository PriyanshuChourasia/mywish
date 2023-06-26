<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\SubjectSelect;
use Illuminate\Support\Facades\Validator;

class SubjectSelectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['collections'] = SubjectSelect::Where('status','=','active')->orWhere('status','=', 'requested')->orWhere('status','=',null)->get();
        return view('modules.subject_select.subject_select_index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['students'] = Student::all();
        $data['subjects'] = Subject::all();
        return response()->json([
            'status' => 200,
            'html' => view('modules.subject_select.create_subject_select',$data)->render()
        ]);
    }

    public function getSub($id)
    {
        $subjects = SubjectSelect::where('student_id','=',$id)->where('end_date','=',null)->pluck('subject_id')->first();
        $sub_name = Subject::where('id','=',$subjects)->pluck('subject_name')->first();
        $status = SubjectSelect::where('student_id','=',$id)->where('end_date','=',null)->pluck('status')->first();
        return response()->json([
            'status' => 200,
            'sub_name' => $sub_name,
            'status' => $status
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'student_id' => 'required',
            'subject_id' => 'required',
            'routine_group_id' => '',
            
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
            $subjectSelect = new SubjectSelect();
            $subjectSelect->student_id = $request->student_id;
            $subjectSelect->subject_id = $request->subject_id;
            $subjectSelect->save();
            $data['collections'] = SubjectSelect::Where('status','=','active')->orWhere('status','=', 'requested')->get();
            return response()->json([
                'status' => 200,
                'messages' => 'Subject Selected Successfully',
                'html' => view('modules.subject_select.subject_select_index',$data)->render()
            ]);
        }
    }

    public function getStatus($id)
    {
        // dd($id);
        $students = SubjectSelect::find($id);
        return response()->json([
            'status' => 200,
            'html' => view('modules.subject_select.change_status',compact('students'))->render()
        ]);
    }


    public function setStatus(Request $request, $id)
    {
        $students = SubjectSelect::find($id);
        $validator = Validator::make($request->all(),[
            'start_date' => 'required',
            'status' => 'required'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
            $students->start_date = $request->start_date;
            $students->status = $request->status;
            $students->update();
            $data['collections'] = SubjectSelect::Where('status','=','active')->orWhere('status','=', 'requested')->get();
            return response()->json([
                'status' => 200,
                'html' => view('modules.subject_select.subject_select_index',$data)->render()
            ]);
        }

    }

    public function setCom(Request $request, $id)
    {
        $students = SubjectSelect::find($id);
        return response()->json([
            'status' => 200,
            'html' => view('modules.subject_select.complete_status',compact('students'))->render()
        ]);
      
    }

    public function saveCom(Request $request, $id)
    {
        $students = SubjectSelect::find($id);
        $validator = Validator::make($request->all(),[
            'end_date' => 'required',
            'status' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }
        else{
            $students->end_date = $request->end_date;
            $students->status = $request->status;
            $students->update();
            $data['collections'] = SubjectSelect::Where('status','=','active')->orWhere('status','=', 'requested')->get();
            return response()->json([
                'status' => 200,
                'html' => view('modules.subject_select.complete_status',$data)->render()
            ]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(SubjectSelect $subjectSelect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubjectSelect $subjectSelect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubjectSelect $subjectSelect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjectSelect $subjectSelect)
    {
        //
    }
}
