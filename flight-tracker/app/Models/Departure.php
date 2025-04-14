<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    use HasFactory;

    protected $table = 'departures';

    protected $primaryKey = 'departure_id';

    protected $fillable = [
        'flight_id', 'departure_airport', 'scheduled_departure', 'status'
    ];

    //kinda optional
    protected $casts = [
        'scheduled_departure' => 'datetime'
    ];
}
