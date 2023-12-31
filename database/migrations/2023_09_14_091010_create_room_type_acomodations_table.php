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
        Schema::create('room_type_acomodations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_type_id')->nullable()->references('id')->on('room_types')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('acomodation_id')->nullable()->references('id')->on('acomodations')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_type_acomodations');
    }
};
