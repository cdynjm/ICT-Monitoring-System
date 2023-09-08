<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Report;
use App\Models\User;
use App\Models\SMSToken;

class ReportController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(){

        $rooms = Room::orderBy('room', 'ASC')->get();

        if(Auth::user()->type == 1) {
            $reports = Report::orderBy('date_reported', 'DESC')->get();
        }
        if(Auth::user()->type == 2) {
            $reports = Report::where(['userid' => Auth::user()->userid])->orderBy('date_reported', 'DESC')->get();
        }

        return view('reports', compact('rooms', 'reports'));

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function create(Request $request) {

        date_default_timezone_set("Asia/Singapore"); 

        $admin = User::where(['id' => 1])->where(['type' => 1])->get();

        $smstoken = SMSToken::get();

        foreach ($smstoken as $st) {
            $mobile_iden = $st->mobile_identity; // as you have copied from the url, explained above
            $mobile_token = $st->access_token; // as per your creation of token
        }
        
        foreach($admin as $admin) {
            $addresses = $admin->phone; // mobile number to send text to
            break;
        }

        $room = Room::where(['id' => $request->room])->get();

        foreach($room as $room) {
            $sms = "ICT Monitoring System\n\nFrom: ".Auth::user()->Instructor->name."\nRoom: ".$room->room."\n\n".$request->description;
        }
        $ch = curl_init();
        foreach ($smstoken as $st) {
            curl_setopt($ch, CURLOPT_URL, $st->url);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"data\":{\"addresses\":[\"$addresses\"],\"message\":\"$sms\",\"target_device_iden\":\"$mobile_iden\"}}");

        $headers = [];
        $headers[] = 'Access-Token: '.$mobile_token;
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        
        Report::create([
            'userid' => Auth::user()->userid,
            'roomid' => $request->room,
            'description' => $request->description,
            'status' => 1,
            'date_reported' => date('Y-m-d H:i'),
            'date_fixed' => null,
            'admin_read' => 1,
            'user_read' => 0
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Report Sent Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function update(Request $request) {

        date_default_timezone_set("Asia/Singapore"); 

        Report::where(['id' => $request->reportid])->update([
            'roomid' => $request->room,
            'description' => $request->description,
            'date_reported' => date('Y-m-d H:i'),
            'admin_read' => 1,
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Report Information Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function fixed(Request $request) {

        date_default_timezone_set("Asia/Singapore"); 

        $smstoken = SMSToken::get();

        foreach ($smstoken as $st) {
            $mobile_iden = $st->mobile_identity; // as you have copied from the url, explained above
            $mobile_token = $st->access_token; // as per your creation of token
        }
        
        $addresses = $request->contact_number; // mobile number to send text to

        $sms = "ICT Monitoring System\n\nFrom: Administrator \nRoom: ".$request->room."\n\n".$request->description."\n\nStatus: FIXED";
        
        $ch = curl_init();
        foreach ($smstoken as $st) {
            curl_setopt($ch, CURLOPT_URL, $st->url);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"data\":{\"addresses\":[\"$addresses\"],\"message\":\"$sms\",\"target_device_iden\":\"$mobile_iden\"}}");

        $headers = [];
        $headers[] = 'Access-Token: '.$mobile_token;
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        Report::where(['id' => $request->reportid])->update([
            'status' => 0,
            'date_fixed' => date('Y-m-d H:i'),
            'user_read' => 1
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Report Information Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function notify(Request $request) {

        if($request->read == true) {

            if(Auth::user()->type == 1) {

                $reports = Report::get();

                foreach($reports as $rep) {

                    Report::where(['id' => $rep->id])->update(['admin_read' => 0]);

                }
            }

            if(Auth::user()->type == 2) {

                Report::where(['userid' => Auth::user()->userid])->update(['user_read' => 0]);

            }
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function delete(Request $request) {

        Report::where(['id' => $request->reportid])->delete();

        return response()->json(['Error' => 0, 'Message'=> 'Report Deleted Successfully']); 

    }
}
