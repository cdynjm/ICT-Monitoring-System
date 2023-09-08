<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\Room;

class ScheduleController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function create(Request $request) {

        date_default_timezone_set("Asia/Singapore"); 

        Schedule::create([
            'userid' => Auth::user()->userid,
            'roomid' => $request->room,
            'date_from' => date('Y-m-d')." ".$request->date_from,
            'date_to' => date('Y-m-d')." ".$request->date_to,
            'status' => 1
        ]);

        Room::where(['id' => $request->room])->update(['status' => 0]);

        return response()->json(['Error' => 0, 'Message'=> 'Class Schedule Set Successfully']); 

    }
}
