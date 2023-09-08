<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Schedule;

class ResetSchedController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function reset() {

        date_default_timezone_set("Asia/Singapore"); 

        $schedule = Schedule::where(['status' => 1])->get();

        foreach($schedule as $sched) {

            if(date('Y-m-d H:i') > $sched->date_to) {

                Schedule::where(['id' => $sched->id])->update(['status' => 0]);
                Room::where(['id' => $sched->roomid])->update(['status' => 1]);
            }
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function schedule() {

        date_default_timezone_set("Asia/Singapore");

        if(Auth::user()->type == 1) {
            return Schedule::where('date_from', 'like', '%'.date('Y-m-d').'%')->orderBy('date_from', 'DESC')->get();
        }

        if(Auth::user()->type == 2) {
            return Schedule::where('date_from', 'like', '%'.date('Y-m-d').'%')->where(['userid' => Auth::user()->userid])->orderBy('date_from', 'DESC')->get();
        }

    }
}
