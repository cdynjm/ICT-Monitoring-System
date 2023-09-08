<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ResetSchedController;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ClassHistoryController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(){

        $obj = new ResetSchedController;

        $schedule = $obj->schedule();
        
        return view('class-history', compact('schedule'));

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function search(Request $request) {

        $search = $request->class_log_date;

        if(Auth::user()->type == 1) {
            $schedule = Schedule::where('date_from', 'like', '%'.date('Y-m-d', strtotime($search)).'%')->orderBy('date_from', 'DESC')->get();
        }
        if(Auth::user()->type == 2) {
            $schedule = Schedule::where('date_from', 'like', '%'.date('Y-m-d', strtotime($search)).'%')->where(['userid' => Auth::user()->userid])->orderBy('date_from', 'DESC')->get();
        }

        return view('table.class-logs-table', compact('schedule'));

    }
}
