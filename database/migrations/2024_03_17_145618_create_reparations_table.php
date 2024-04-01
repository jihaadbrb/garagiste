<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reparations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('description');
            $table->string('status');
            $table->date('startdate');
            $table->date('enddate');
            $table->string('mechanicnotes');
            $table->string('clientnotes');
            $table->bigInteger('user_id')->unsigned(); // Corrected column type to match the users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('vehicleid')->unsigned(); // Assuming this references the id of the vehicles table
            $table->foreign('vehicleid')->references('id')->on('Vehicules')->onDelete('cascade'); // corrected table name
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparations');
    }
};
