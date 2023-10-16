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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('published')->default(1);

            $table->string('kk_slug')->unique();
            $table->string('ru_slug')->unique();
            $table->string('en_slug')->unique();

            $table->string('kk_title');
            $table->string('ru_title');
            $table->string('en_title');

            $table->longText('kk_content');
            $table->longText('ru_content');
            $table->longText('en_content');

            $table->integer('kk_views')->default(0);
            $table->integer('ru_views')->default(0);
            $table->integer('en_views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
