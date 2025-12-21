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
        Schema::create('meditations', function (Blueprint $table) 
        {
            $table->id();
            $table->string('name',100);
            $table->string('image',150);
            $table->string('audio',200)->nullable();
            $table->text('desc');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('position')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meditations');
    }
};
