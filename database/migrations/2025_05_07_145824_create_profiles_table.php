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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->string('gender', 20)->nullable();
            $table->string('profile_ph', 191)->nullable();
            $table->text('description')->nullable();
            $table->string('nickname', 50)->unique();
            $table->string('cyclist_type', 50);
            $table->integer('busy_routes')->default(0);
            $table->text('achievements')->nullable();
        
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('interest_place_id')->nullable()->constrained('interest_places')->onDelete('set null');
            $table->foreignId('configuration_id')->nullable()->constrained('configurations')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
