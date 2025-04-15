<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    protected $table = 'airlines';

    protected $primaryKey = 'airline_icao';

    // To indicate that the PK is not auto-incrementable (bc ICAO is a string)
    public $incrementing = false;

    protected $fillable = [
        'airline_icao', 'name', 'country'
    ];


    public function aircraft(){
        return $this->hasMany(Aircraft::class, 'airline_icao', 'airline_icao');
    }




}
