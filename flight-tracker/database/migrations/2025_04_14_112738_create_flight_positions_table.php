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
    Schema::create('flight_positions', function (Blueprint $table) {
        $table->id('position_id');
        $table->foreignId('flight_id')
                  ->constrained('flights', 'flight_id')
                  ->onDelete('cascade');
        $table->double('latitude');
        $table->double('longitude');
        $table->double('altitude');
        $table->double('speed');
        $table->double('heading');
        $table->timestamp('timestamp');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_positions');
    }
};
