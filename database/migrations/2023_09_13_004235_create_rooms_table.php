<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name',60);
            $table->foreignId('hotel_id')->references('id')->on('hotels')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('room_type_id')->references('id')->on('room_types')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('acomodation_id')->references('id')->on('acomodations')->nullOnDelete()->cascadeOnUpdate();
            $table->bigInteger('updated_by')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};