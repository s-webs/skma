<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('kk_title')->nullable();
            $table->string('ru_title')->nullable();
            $table->string('en_title')->nullable();
            $table->string('kk_description')->nullable();
            $table->string('ru_description')->nullable();
            $table->string('en_description')->nullable();
            $table->string('ru_link')->nullable();
            $table->string('en_link')->nullable();
            $table->string('kk_link')->nullable();
            $table->string('ru_image');
            $table->string('en_image');
            $table->string('kk_image');
            $table->integer('published')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
