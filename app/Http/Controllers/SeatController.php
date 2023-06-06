<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Subject;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seat = DB::table('seats')->where('seats.created_at','>', Carbon::today())->latest('seats.created_at')->join('subjects','subjects.id', '=', 'seats.subject_id')->get();
        $subject = DB::table('subjects')->get();
        return view('modules.seat.seat_index',['seats' => $seat, 'subjects' => $subject]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['subjects'] = Subject::all();
        return response()->json([
            'status' => 200,
            'html' => view('modules.seat.create_seat', $data)->render()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'time' => 'required',
            'subject_id' => 'required',
            'student_id' => '',
            'seat_number' => 'required|string|max:2',
            'booking_date' => '',
            'booking_time' => '',
            'revoke_reason' => '',
            'revoke_time' => '',
            'status' => '',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages'=> $validator->getMessageBag(),
            ]);
        }else{
            $num = $request->seat_number;
            for( $i = 1; $i<= $num; $i++)
            {
                $seat = new Seat();
                $seat->date = date('Y-m-d', strtotime($request->date));
                $seat->time = $request->time;
                $seat->subject_id = $request->subject_id;
                $seat->seat_number = $request->seat_number;
                $seat->save();
            }
            return response()->json([
                'status' => 200,
                'messages' => 'Seat Added Successfully',
            ]);
        }
    }

    public function bookshow()
    {
        $data['collections'] = DB::table('seats')->where('seats.created_at','>', Carbon::today())->latest('seats.created_at')->get();
        return response()->json([
            'status' => 200,
            'html' => view('modules.seat.book_seat',$data)->render(),
        ]);
    }

    public function seatbookshow($id)
    {
        
        $data['seatId'] = Seat::find($id);
        return response()->json([
            'status'=> 200,
            'html' => view('modules.seat.seat_booked',$data)->render(),
        ]);
    }


    public function finalbooking($id, Request $request)
    {
        $booking = Seat::find($id);
        $validator = Validator::make($request->all(),[
            'student_id' => 'required',

        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'messages'=> $validator->getMessageBag()
            ]);
        }else{
            $booking = Seat::find($id);
            $booking->student_id = $request->student_id;
            $booking->update();

            return response()->json([
                'status' => 200,
                'messages' => 'Seat Booked Successfully'
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

    public function bookindex()
    {
        $userId = auth()->user()->id;
        $data['collections'] = Seat::where('student_id',$userId)->get();
        return view('modules.seat.book_seat_index',$data);       
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function showrevoke($id)
    {
        $iD = $id;
        dd($iD); 
        $seat = Seat::find($id);
        return response()->json([
            'status' => 200,
            'html' => view('modules.seat.seat_revoke',$seat)->render(),
        ]);
    }

    public function seatbook($id, Request $request)
    {
        $seatid = Seat::find($id);
        // dd($seatid);
        // dd($seatid);
        $userid = auth()->user()->id;
        $subjectid = auth()->user()->id;
        $seatid->student_id = $userid;
        $seatid->update();
        $data['collections'] = Seat::where('subject_id', $subjectid)->get();
        return view('modules.seat.book_seat_index',$data);
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
