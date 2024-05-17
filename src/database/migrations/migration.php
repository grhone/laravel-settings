<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('laravel_settings', function (Blueprint $table) {
            $table->id();
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->string('key');
            $table->text('value')->nullable();
            $table->timestamps();

            $table->index(['model_type', 'model_id', 'key']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('laravel_settings');
    }
};
