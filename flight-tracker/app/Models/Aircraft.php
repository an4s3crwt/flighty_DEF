<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Airline;
use App\Models\Flight;
class Aircraft extends Model
{
    use HasFactory;

    //The table associated with the model
    protected $table = 'aircraft';

    //PK
    protected $primaryKey = 'icao24';

    // To indicate that the PK is not auto-incrementable (bc ICAO is a string)
    public $incrementing = false;

    protected $fillable = [
        'icao24', 'registration', 'model', 'manufacturer', 'airline_icao', 'country'
    ];


    public function airline(){
        return $this->belongsTo(Airline::class, 'airline_icao', 'icao');
    }

    public function flights(){
        return $this->hasMany(Flight::class, 'aircraft_icao', 'icao24');
    }
}
