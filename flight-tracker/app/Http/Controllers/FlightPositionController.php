<?php

namespace App\Http\Controllers;
use App\Models\FlightPosition;
use Illuminate\Http\Request;

class FlightPositionController extends Controller
{
   public function forFlight($id){
    $positions = FlightPosition::where('flight_id', $id)->orderBy('timestamp')->get();
    return resposnse()->json($positions);
   }
}
