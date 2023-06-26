<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fees;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\SubjectSelect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
    protected $gender = ['Male','Female','Others'];
    protected $student_class = ['1','2','3','4','5','6','7','8','9','10','11','12','Under-Graduate','Graduated','Diploma'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['collections'] = Student::where('status','active')->get();
        return view('modules.student.student_index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['genders'] = $this->gender;
        $data['subjects'] = Subject::all();
        $data['student_classes'] = $this->student_class;
        return response()->json([
            'status' => 200,
            'html' => view('modules.student.create_student',$data)->render(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=> 'required|string|max:50',
            'email'=> 'required|email|unique:students|max:100',
            'password'=> '',
            'contact_no' => 'required|string|min:10|max:12',
            'alt_contact' => 'required|string|min:10|max:12',
            'parents_name' => 'required',
            'gender'=> 'required',
            'address'=> 'required',
            'education'=> 'required',
            'profile_image'=> '',
            'document_image'=> '',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages'=> $validator->getMessageBag(),
            ]);
        }else{
            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->password = Hash::make('password');
            $student->contact_no = $request->contact_no;
            $student->alt_contact = $request->alt_contact;
            $student->gender = $request->gender;
            $student->parents_name = $request->parents_name;
            $student->address = $request->address;
            $student->education = $request->education;
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/student/profile_image', $filename);
                $student->profile_image = $filename;
            };
            if ($request->hasFile('document_image')) {
                $file = $request->file('document_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/student/document_image', $filename);
                $student->document_image = $filename;
            };
            event(new Registered($student));
            $student->save();
            $data['collections'] = Student::where('status','active')->get();
            $html = view('modules.student.student_index',$data)->render();
            return response()->json([
                'status' => 200,
                'messages' => 'Student Registered Successfully',
                'html'=> view('modules.student.student_index',$data)->render(),
            ]);
        }
    }

    /**
     * Display the specified resource.k
     */
    public function show(string $id)
    {
        $data['student'] = Student::find($id);
        return view('modules.student.view_student',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['student'] = Student::find($id);
        $data['genders'] = $this->gender;
        $data['student_classes'] = $this->student_class;
        return response()->json([
            'status' => 200,
            'html' => view('modules.student.edit_student',$data)->render(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $validator = Validator::make($request->all(),[
            'name'=> 'required|string|max:50',
            'email'=> '',
            'password'=> '',
            'contact_no' => 'required|string|min:10|max:12',
            'alt_contact' => 'required|string|min:10|max:12',
            'gender'=> 'required',
            'parents_name' => 'required',
            'address'=> 'required',
            'education'=> 'required',
            'profile_image'=> '',
            'document_image'=> '',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag(),
            ]);
        }else{
            $student->name = $request->name;
            $student->email = $request->email;
            $student->password = Hash::make('password');
            $student->contact_no = $request->contact_no;
            $student->alt_contact = $request->alt_contact;
            $student->gender = $request->gender;
            $student->parents_name = $request->parents_name;
            $student->address = $request->address;
            $student->education = $request->education;
            if ($request->hasFile('profile_image')) {
                $destination = 'uploads/student/profile_image'.$student->profile_image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('profile_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/student/profile_image', $filename);
                $student->profile_image = $filename;
            };
            if ($request->hasFile('document_image')) {
                $destination = 'uploads/student/document_image'.$student->document_image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('document_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/student/document_image', $filename);
                $student->document_image = $filename;
            };
            $student->update();
            $data['collections'] = Student::where('status','active')->get();
            return response()->json([
                'status'=> 200,
                'messages' => 'Student Data Updated Successfully',
                'html' => view('modules.student.student_index',$data)->render()
            ]);
        }
    }

    public function createDelete($id)
    {
        $student = Student::find($id);
        return response()->json([
            'status' => 200,
            'html' => view('modules.student.student_delete',compact('student'))->render()
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id, Request $request)
    // {
    //     $student = Student::find($id);
    // //    dd($student);
    //     $student->delete();
    //    return redirect()->route('admin.student_index');
    // }


    public function banCreate(Request $request, $id)
    {
        $student = Student::find($id);
        return response()->json([
            'status' => 200,
            'html' => view('modules.student.student_ban',compact('student'))->render()
        ]);
    }


    public function destroy($id)
    {
 
        // $student = Student::find($id);
        // $student->delete(); 

        $data['collections'] = Student::where('status','active')->get();
        return response()->json([
            'status' => 200,
            'html' => view('modules.student.student_index',$data)->render()
        ]);

    }
}
