<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aircraft;


class AircraftController extends Controller
{
   
    public function show($icao24)
    {
        $aircraft = Aircraft::where('icao24', $icao24)->firstOrFail();
        return response()->json($aircraft);
    }
}
