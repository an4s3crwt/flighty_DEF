<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('flights', function (Blueprint $table) {
        $table->id('flight_id');
        $table->string('callsign');
        $table->string('status');
        $table->string('aircraft_icao');
        $table->string('departure_airport');
        $table->string('arrival_airport');
        $table->dateTime('scheduled_departure')->nullable();
        $table->dateTime('scheduled_arrival')->nullable();
        
        $table->timestamp('actual_departure')->nullable();
        $table->timestamp('actual_arrival')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
