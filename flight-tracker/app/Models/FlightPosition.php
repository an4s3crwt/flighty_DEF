<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flight;

class FlightPosition extends Model
{
    use HasFactory;

    // Primary key is 'position_id' (no need for redeclaration if it's already correct)
    protected $primaryKey = 'position_id';

    // Fillable fields for mass assignment
    protected $fillable = [
        'flight_id', 'latitude', 'longitude', 'altitude', 'speed', 'heading', 'timestamp'
    ];

    // Automatically cast timestamp to Carbon instance
    protected $casts = [
        'timestamp' => 'datetime',
    ];

    // Define the relationship to the Flight model
    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id');
    }
}

