<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\SubjectSelect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AttendanceController extends Controller
{

    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['collections'] = Attendance::all();
        return view('modules.attendance.attendance_index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['students'] = Student::all();
        return response()->json([
            'status' => 200,
            'html' => view('modules.attendance.create_attendance',$data)->render(),
        ]);
    }

    public function getInfo($id)
    {
        $sub_id = SubjectSelect::where('student_id',$id)->pluck('subject_id')->first();
        return response()->json([
            'status'=> 200,
            'sub_id' => $sub_id
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
            'appearance' => '',
            'status' => '',
            'day_name' => 'required',
            'date' => '',
            'time' => ''
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        }else{
            $attendance = new Attendance();
            $attendance->date = date('Y-m-d', strtotime($request->date));
            $attendance->time = $request->time;
            $attendance->student_id = $request->student_id;
            $attendance->subject_id =$request->subject_id;
            $attendance->appearance = $request->appearance;
            $attendance->status = $request->status;
            $attendance->day_name = $request->day_name;
            $attendance->save();
            $data['collections'] = Attendance::all();
            return response()->json([
                'status' => 200,
                'html' => view('modules.attendance.attendance_index',$data)->render(),
                'messages' => 'Attendance Save Successfully',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance, $id)
    {
        $attendance = Attendance::find($id);
        
        if(!is_null($attendance))
        {
            $attendance->delete();
        }
        
        return redirect()->route('admin.attendance_index');
    }
}
