<?php

namespace App\Http\Controllers\Student;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\SubjectSelect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubjectSelectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $data['collections'] = SubjectSelect::Where('student_id','=',$user)->orWhere('status','=', 'requested')->get();
        return view('student.subjectSelect.subject_select_index',$data);
    }


    public function getFees($id)
    {
        $sub_id = Subject::find($id);
        // dd($sub_id);
        $fee = $sub_id->fees;
        return response()->json([
            'status' => 200,
            'fees' => $fee
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['subjects'] = Subject::all();
        return response()->json([
            'status' => 200,
            'html' => view('student.subjectSelect.create_subject_select',$data)->render()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'subject_id' => 'required',
            'student_id' => 'required',
            'status' => ''
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
            $subject = new SubjectSelect();
            $subject->student_id = $request->student_id;
            $subject->subject_id = $request->subject_id;
            $subject->status = $request->status;
            $subject->save();
            $data['collections'] = SubjectSelect::Where('status','=','active')->orWhere('status','=', 'requested')->get();
            return response()->json([
                'status' => 200,
                'html' => view('student.subjectSelect.subject_select_index',$data)->render()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
