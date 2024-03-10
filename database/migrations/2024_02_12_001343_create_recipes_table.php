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
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('shortDescription', 250);
            $table->string('ingredients', 500);
            $table->string('preparation', 500);
            $table->enum('type', ['Slatko', 'Slano']);
            $table->set('subtype', ['Domaca kuhinja', 'Svetska kuhinja']);
            $table->enum('numberOfPeople', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']);
            $table->string('recipePicture', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
