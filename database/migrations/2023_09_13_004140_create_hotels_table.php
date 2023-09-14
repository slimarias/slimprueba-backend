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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name',60)->unique();
            $table->string('address',100);
            $table->foreignId('city_id')->nullable()->references('id')->on('cities')->nullOnDelete()->cascadeOnUpdate();
            $table->string('document',30)->unique();
            $table->integer('rooms');
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
        Schema::dropIfExists('hotels');
    }
};