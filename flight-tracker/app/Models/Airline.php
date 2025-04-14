<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    protected $table = 'airlines';

    protected $primaryKey = 'airline_icao';

    public $incrementing = false;

    protected $fillable = [
        'airline_icao', 'name', 'country'
    ];

    
}
