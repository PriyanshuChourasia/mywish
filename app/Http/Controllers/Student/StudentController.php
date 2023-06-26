<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.dashboard');
    }


    public function profile()
    {
        $user = Auth::user()->id;
        $data['student'] = Student::find($user);
        
        return view('student.profile.profile_index',$data);
    }


    public function changePassword($id)
    {
        // dd($id);
        $student = Student::find($id);
        return response()->json([
            'status' => 200,
            'html' => view('student.profile.change_password',compact('student'))->render()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'password' => 'required'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
            $student = Student::find($id);
            $student->password = Hash::make( $request->password);
            $student->save();
            $user = Auth::user()->id;
            $data['student'] = Student::find($user);
            return response()->json([
                'status' => 200,
                'html'=> view('student.profile.profile_index',$data)->render()
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
