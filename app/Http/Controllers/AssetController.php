<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Asset;
use App\Models\User;

class AssetController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(Request $request) {

        if(Auth::user()->type == 1) {

            $asset = Asset::orderBy('created_at', 'DESC')->get();

            return view('borrowed-assets', compact('asset'));

        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function create(Request $request) {

        Asset::create([
            'name' => $request->fullname,
            'position' => $request->position,
            'contact_number' => $request->contactnumber,
            'address' => $request->address,
            'property_name' => $request->property_name,
            'quantity' => $request->quantity,
            'person_in_charge' => $request->person_in_charge,
            'date_borrowed' => $request->date_borrowed,
            'date_returned' => null,
            'status' => 1
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Property/Asset Borrowed Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function return(Request $request) {

        Asset::where(['id' => $request->assetid])->update([
            'date_returned' => $request->date_returned,
            'status' => 0
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Property/Asset Returned Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function update(Request $request) {

        Asset::where(['id' => $request->assetid])->update([
            'name' => $request->fullname,
            'position' => $request->position,
            'contact_number' => $request->contactnumber,
            'address' => $request->address,
            'property_name' => $request->property_name,
            'quantity' => $request->quantity,
            'person_in_charge' => $request->person_in_charge,
            'date_borrowed' => $request->date_borrowed
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Borrowed Property/Asset Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function delete(Request $request) {

        Asset::where(['id' => $request->assetid])->delete();

        return response()->json(['Error' => 0, 'Message'=> 'Property/Asset Deleted Successfully']); 

    }
}
