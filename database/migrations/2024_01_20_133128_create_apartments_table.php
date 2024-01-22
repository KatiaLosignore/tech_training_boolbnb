<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Chiave esterna collegata alla tabella "users"
            $table->string('name');
            $table->integer('rooms');
            $table->integer('beds');
            $table->integer('bathrooms');
            $table->integer('mq');
            $table->string('address');
            $table->decimal('lat', 11, 8);
            $table->decimal('lon', 11, 8);
            $table->string('photo', 255)->nullable();
            $table->tinyInteger('visible')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apartments');
    }
};
