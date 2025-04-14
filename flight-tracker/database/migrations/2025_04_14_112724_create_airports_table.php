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
    Schema::create('airports', function (Blueprint $table) {
        $table->string('icao')->primary();
        $table->string('iata')->nullable();
        $table->string('name');
        $table->string('city');
        $table->string('country');
        $table->double('latitude');
        $table->double('longitude');
        $table->string('timezone');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
