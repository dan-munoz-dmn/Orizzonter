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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();

            $table->string('name', 255);
            $table->integer('ranked')->default(0);
            $table->date('creation_date');
            $table->text('description')->nullable();
        
            $table->foreignId('saved_route_id')->nullable()->constrained('routes')->nullOnDelete();
            $table->foreignId('route_detail_id')->constrained('route_details')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
