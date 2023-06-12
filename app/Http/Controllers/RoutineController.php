<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\RoutineGroup;
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
        $data['routine_count'] = Routine::all()->count();   
        $data['routine_group'] = RoutineGroup::all()->count();  
        return view('modules.routine.routine_index',$data);
    }

    public function list_index()
    {
        $data['collections'] = Routine::all();
        return view('modules.routine.routine_list_index',$data);
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
            'day_name' => 'required',
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
            $routine->day_name = $request->day_name;
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
    public function destroy(Routine $routine, $id)
    {
        $routine = Routine::find($id);

        $routine->delete();

        return redirect()->route('admin.routine_list_index');
    }
}
