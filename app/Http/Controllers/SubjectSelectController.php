<?php

namespace App\Http\Controllers;

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
        $data['collections'] = SubjectSelect::all();
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'student_id' => 'required',
            'subject_id' => 'required',
            'routine_group_id' => ''
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
            $data['collections'] = SubjectSelect::all();
            return response()->json([
                'status' => 200,
                'messages' => 'Subject Selected Successfully',
                'html' => view('modules.subject_select.subject_select_index',$data)->render()
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
