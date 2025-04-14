<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    use HasFactory;

    protected $table = 'aircraft';

    protected $primaryKey = 'icao24';

    public $incrementing = false;

    protected $fillable = [
        'icao24', 'registration', 'model', 'manufacturer', 'airline_icao', 'country'
    ];
}
