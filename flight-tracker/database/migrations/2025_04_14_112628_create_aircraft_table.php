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
    Schema::create('aircraft', function (Blueprint $table) {
        $table->string('icao24')->primary();
        $table->string('registration');
        $table->string('model');
        $table->string('manufacturer');
        $table->string('airline_icao')->nullable();
        $table->string('country');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aircraft');
    }
};
