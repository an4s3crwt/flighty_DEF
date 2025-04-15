<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightPosition extends Model
{
    use HasFactory;


    protected $primaryKey = 'position_id';

    public function flight(){
        return $this->belongsTo(Flight::class, 'flight_id');
    }
}
