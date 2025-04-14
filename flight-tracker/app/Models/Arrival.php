<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrival extends Model
{
    use HasFactory;

    protected $table = 'arrivals';

    protected $primaryKey = 'arrival_id';

    protected $fillable = [
        'flight_id', 'arrival_airport', 'scheduled_arrival', 'status'
    ];

    //kinda optional
    protected $casts = [
        'scheduled_arrival' => 'datetime'
    ];
}
