<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\Subject;
use App\Models\RoutineGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RoutineGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['collections'] = RoutineGroup::all();
        return view('modules.group_routine.group_routine_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['monday'] = Routine::where('day_name', 'MONDAY')->get();
        $data['tuesday'] = Routine::where('day_name', 'TUESDAY')->get();
        $data['wednesday'] = Routine::where('day_name', 'WEDNESDAY')->get();
        $data['thrusday'] = Routine::where('day_name', 'THRUSDAY')->get();
        $data['friday'] = Routine::where('day_name', 'FRIDAY')->get();
        $data['subjects'] = Subject::all();
        return response()->json([
            'status' => 200,
            'html' => view('modules.group_routine.create_group_routine', $data)->render(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'group_name' => 'required',
            'day_one' => '',
            'day_two' => '',
            'day_three' => '',
            'day_four' => '',
            'day_five' => '',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $routineGroup = new RoutineGroup();
            $routineGroup->group_name = $request->group_name;
            $routineGroup->day_one = $request->day_one;
            $routineGroup->day_two = $request->day_two;
            $routineGroup->day_three = $request->day_three;
            $routineGroup->day_four = $request->day_four;
            $routineGroup->day_five = $request->day_five;
            $routineGroup->save();
            $data['collections'] = RoutineGroup::all();
            return response()->json([
                'status' => 200,
                'messages' => 'Routine Group Registered Successfully',
                'html' => view('modules.group_routine.group_routine_index', $data)->render(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RoutineGroup $routineGroup, $id)
    {
        $data['routines'] = RoutineGroup::find($id);
        $data['subjects'] = Subject::all();
        return response()->json([
            'status' => 200,
            'html' => view('modules.group_routine.view_group_routine',$data)->render()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoutineGroup $routineGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoutineGroup $routineGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoutineGroup $routineGroup, $id)
    {
        $routineGroup = RoutineGroup::find($id);

        $routineGroup->delete();

        return redirect()->route('admin.group_routine_index');
    }
}
