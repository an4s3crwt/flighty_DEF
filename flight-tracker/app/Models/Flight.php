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
}
