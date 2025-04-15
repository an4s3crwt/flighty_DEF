<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $table = 'flights';

    protected $primaryKey = 'flight_id';

    protected $fillable = [
        'callsign', 'status', 'aircraft_icao', 'departure_airport',
        'arrival_airport', 'scheduled_departure', 'scheduled_arrival',
        'actual_departure', 'actual_arrival'
    ];

    //kinda optional
    protected $casts = [
        'scheduled_departure' => 'datetime',
        'scheduled_arrival' => 'datetime',
        'actual_departure' => 'datetime',
        'actual_arrival' => 'datetime',
    ];




    public function aircraft(){
        return $this->belongsTo(Aircraft::class, 'aircraft_icao', 'icao24');
    }

    public function departureAirport(){
        return $this->belongsTo(Airport::class,'departure_airport', 'icao');
    }


    public function arrivalAirport(){
        return $this->belongsTo(Airport::class, 'arrival_airport', 'icao');
    }


    public function flightPositions(){
        return $this->hasMany(FlightPosition::class, 'flight_id');
    }
  

public function positions()
{
    return $this->hasMany(FlightPosition::class, 'flight_id');
}


    ///añadir users

}

