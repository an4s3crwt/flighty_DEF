<?php

namespace App\Http\Controllers;
use App\Models\Airport;

use Illuminate\Http\Request;

class AirportController extends Controller
{
  
    public function show()
    {
        $airport = Airport::where('icao', $icao)->firstOrFail();
        return response()->json($airport);
    }

   
}
