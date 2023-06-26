<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['collections'] = Subject::all();
        return view('modules.subject.subject_index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'status' => 200,
            'html' => view('modules.subject.create_subject')->render(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'subject_name' => 'required|string',
            'fees'=> 'required|max:6',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
            $subject = new Subject();
            $subject->subject_name = $request->subject_name;
            $subject->fees = $request->fees;
            $subject->save();
            $data['collections'] = Subject::all();
            return response()->json([
                'status' => 200,
                'messages' => 'Subject Added Successfully',
                'html' => view('modules.subject.subject_index',$data)->render(),
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
        $data['subject'] = Subject::find($id);
        return response()->json([
            'status' => 200,
            'html' => view('modules.subject.edit_subject',$data)->render()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subject = Subject::find($id);
        $validator = Validator::make($request->all(),[
            'subject_name' => 'required|string',
            'fees'=> 'required|max:6',
        ]);


        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
            $subject->subject_name = $request->subject_name;
            $subject->fees = $request->fees;
            $subject->save();

            $data['collections'] = Subject::all();
            return response()->json([
                'status' => 200,
                'html' => view('modules.subject.subject_index',$data)->render(),
                'messages' => 'Subject Edited Successfully'
            ]);
        }
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
