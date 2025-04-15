<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airline;

class AirlineController extends Controller
{
    
    public function show($icao)
    {
        $airline = Airline::where('icao', $icao)->firstOrFail();
        return response()->json($airline);    
    }

   
}
