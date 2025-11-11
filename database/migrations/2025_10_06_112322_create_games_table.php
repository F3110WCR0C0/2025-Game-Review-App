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
        Schema::create('games', function (Blueprint $table) {
            // this is what brings the table to phpmyadmin it creates the table there
            $table->id();
            $table->string('name');
            $table->date('release_date');
            $table->mediumText('description');
            $table->unsignedBigInteger('age_rating');
            $table->decimal('price');
            $table->decimal('discount');
            $table->string('image');
            $table->timestamps('');
        });
    }

    /**
     * 
     * Need to add Foreign Keys Later
     * 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
