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
        Schema::create('interest_places', function (Blueprint $table) {
            $table->id();

            $table->string('description', 255);
            $table->string('name', 100);
            $table->string('place_type', 50);
            $table->string('location', 191);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interest_places');
    }
};
