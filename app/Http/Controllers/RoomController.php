<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\User;
use App\Models\Schedule;
use App\Http\Controllers\ResetSchedController;

class RoomController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(Request $request) {

        $obj = new ResetSchedController;
        $obj->reset();

        $room = Room::orderBy('room', 'ASC')->get();
        $schedule = Schedule::where(['status' => 1])->get();

        return view('rooms', compact('room', 'schedule'));

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function create(Request $request) {

        Room::create([
            'room' => $request->room,
            'status' => 1
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Room Added Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function update(Request $request) {

        Room::where(['id' => $request->roomid])->update([
            'room' => $request->room,
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Room Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function delete(Request $request) {

        Room::where(['id' => $request->roomid])->delete();

        return response()->json(['Error' => 0, 'Message'=> 'Room Deleted Successfully']); 

    }
}
