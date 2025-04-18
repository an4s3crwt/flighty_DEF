<?php

namespace App\Http\Controllers;
use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Http\Request;

class AirportController extends Controller
{
  
    
    public function showByIcao($icao)
    {
        $airport = Airport::where('icao', strtoupper($icao))->first();

        if (!$airport) {
            return response()->json(['error' => 'Airport not found'], 404);
        }

        return response()->json([
            'airport' => $airport->name,
            'country_code' => $airport->country,
            'iata' => $airport->iata ?? 'Unknown',
            'icao' => $airport->icao,
            'latitude' => $airport->latitude,
            'longitude' => $airport->longitude,
            'region_name' => $airport->region_name ?? 'Unknown',
        ]);
    }

    public function show($icao){
        $airport = \App\Models\Airport::where('icao', $icao)->first();

        if(!$airport) {
            return response()->json(['error' => 'Airport not found¡'], 404);
        }

        return response()->json($airport);
    }
}
   

