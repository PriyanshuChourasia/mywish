<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoutineController extends Controller
{
    protected $day = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THRUSDAY', 'FRIDAY'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('modules.routine.routine_index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['days'] = $this->day;
        return response()->json([
            'status' => 200,
            'html' => view('modules.routine.create_routine',$data)->render(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'routine_name' => 'required|unique',
            'day_count' => 'required',
            'day_one' => '',
            'day_two' => '',
            'day_three' => '',
            'day_four' => '',
            'day_five' => '',
            'class_from'=> 'required',
            'class_upto' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag(),
            ]);
        }else{
            $routine = new Routine();
            $routine->routine_name = $request->routine_name;
            $routine->day_count = $request->day_count;
            $routine->day_one = $request->day_one;
            $routine->day_one = $request->day_two;
            $routine->day_one = $request->day_three;
            $routine->day_one = $request->day_four;
            $routine->day_one = $request->day_five;
            $routine->class_from = $request->class_from;
            $routine->class_upto = $request->class_upto;
            $routine->save();
            return response()->json([
                'status' => 200,
                'messages' => 'Routine Created Successfully',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Routine $routine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Routine $routine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Routine $routine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Routine $routine)
    {
        //
    }
}
