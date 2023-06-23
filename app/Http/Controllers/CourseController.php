<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\RoutineGroup;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['collections'] = Course::where('status','!=','completed')->orWhere('status',NULL)->get();
        return view('modules.courses.course_index',$data);
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
            'html' => view('modules.courses.create_course',$data)->render()
        ]);
    }

    public function getInfo(Request $request, $id)
    {
        $sub = Subject::find($id);
        $sub_dur = $sub->duration;
        $fee = $sub->fees;
        $date = date('Y-m-d');
        $newDate =   date('Y-m-d', strtotime($date. '+' .$sub_dur. 'months'));
        // dd($newDate);
        return response()->json([
            'status' => 200,
            'duration' => $sub_dur,
            'fees' => $fee,
            'end_date' => $newDate
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
            'course_duration' => 'required',
            'routine_id' => '',
            'course_starting_date' => 'required',
            'course_end_date' => 'required',
            'status' => ''
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
            $course = new Course();
            $course->student_id = $request->student_id;
            $course->subject_id = $request->subject_id;
            $course->course_duration = $request->course_duration;
            $course->course_starting_date = $request->course_starting_date;
            $course->course_end_date = $request->course_end_date;
            $course->save();

            $data['collections'] = Course::where('status','running')->get();
            return response()->json([
                'status' => 200,
                'html' => view('modules.courses.course_index',$data)->render(),
                'messages' => 'Course Added Successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, $id)
    {
        $course = Course::find($id);
        $sub_id = $course->subject_id;
        $data['routines'] = RoutineGroup::where('group_name',$sub_id)->get();
        $data['course'] = Course::find($id);
       
        // dd($data['routines']);
        return response()->json([
            'status' => 200,
            'html' => view('modules.courses.course_routine',$data)->render()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course, $id)
    {
        $course = Course::find($id);
        // dd($course);
        $validator = Validator::make($request->all(),[
            'routine_id' => 'required',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
            $course->routine_id = $request->routine_id;
            $course->status = $request->status;
            $course->save();
            $data['collections'] = Course::all();
            return response()->json([
                'status' => 200,
                'html' => view('modules.courses.course_index',$data)->render(),
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
