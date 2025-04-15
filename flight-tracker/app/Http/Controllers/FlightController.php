<?php

namespace App\Http\Controllers;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Flight::with('positions')->get());
    }


    public function byHex($icao24){
        $flight = Flight::whereHas('aircraft', function($query) use ($icao24){
            $query->where('icao24', $icao24);
        })->with('positions')->latest('created_at')->firstOrFail();


        return $response()->json($flight);
    }
    
    
}
