<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    //The table associated with the model
    protected $table = 'airports';

    //PK
    protected $primaryKey = 'icao';

    // To indicate that the PK is not auto-incrementable (bc ICAO is a string)
    public $incrementing = false;

    // The attributes
    protected $fillable = [
        'icao', 'iata', 'name', 'city', 'country', 'latitude', 'longitude', 'timezone'
    ];
}
