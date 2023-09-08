<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Instructor;
use App\Models\User;

class InstructorController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(Request $request) {
        
        if(Auth::user()->type == 1) {

            $instructor = Instructor::orderBy('name', 'ASC')->get();

            return view('laravel-examples.instructors', compact('instructor'));

        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function create(Request $request) {

        $instructor = Instructor::create([
            'name' => $request->fullname,
            'position' => $request->position,
            'contact_number' => $request->contactnumber,
            'address' => $request->address
        ]);

        User::create([
            'userid' => $instructor->id,
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 2
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Instructor Added Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function update(Request $request) {

        $instructor = Instructor::where(['id' => $request->userid])->update([
            'name' => $request->fullname,
            'position' => $request->position,
            'contact_number' => $request->contactnumber,
            'address' => $request->address
        ]);

        User::where(['userid' => $request->userid])->update([
            'name' => $request->fullname
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Instructor Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function delete(Request $request) {

        Instructor::where(['id' => $request->userid])->delete();

        User::where(['userid' => $request->userid])->delete();

        return response()->json(['Error' => 0, 'Message'=> 'Instructor Deleted Successfully']); 

    }
}
