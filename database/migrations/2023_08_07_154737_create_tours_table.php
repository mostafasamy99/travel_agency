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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('travel_id'); // Foreign key for M2O relationship with "travels" table
            $table->string('name');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->integer('price');
            $table->timestamps();

            // Foreign key constraint for M2O relationship with "travels" table
            $table->foreign('travel_id')->references('id')->on('travel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
