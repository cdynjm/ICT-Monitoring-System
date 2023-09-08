<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ResetSchedController;
use App\Models\Room;
use App\Models\User;
use App\Models\Asset;
use App\Models\Instructor;
use App\Models\Schedule;
use App\Models\Report;

class HomeController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function home()
    {
        $count_instructors = Instructor::count();
        $count_assets = Asset::where(['status' => 1])->count();

        if(Auth::user()->type == 1) {
            $count_reports = Report::where(['status' => 1])->count();
        }

        if(Auth::user()->type == 2) {
            $count_reports = Report::where(['userid' => Auth::user()->userid])->where(['status' => 1])->count();
        }

        $rooms = Room::where(['status' => 1])->orderBy('room', 'ASC')->get();

        $obj = new ResetSchedController;
        $obj->reset();

        $schedule = $obj->schedule();

        $count_sched = Schedule::where(['userid' => Auth::user()->userid])->where(['status' => 1])->count();
        $count_rooms = Room::where(['status' => 0])->count();

        return view('dashboard', compact('count_instructors', 'count_assets', 'count_rooms', 'rooms', 'schedule', 'count_sched', 'count_reports'));
    }
}
