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
        Schema::create('departures', function (Blueprint $table) {
            $table->id('departure_id');
            $table->foreignId('flight_id')->constrained('flights', 'flight_id')->onDelete('cascade');
            $table->string('departure_airport', 10);
            $table->foreign('departure_airport')
                  ->references('icao')
                  ->on('airports')
                  ->onDelete('cascade');
            $table->timestamp('scheduled_departure');
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departures');
    }
};
