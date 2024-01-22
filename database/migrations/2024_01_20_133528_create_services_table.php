<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('apartment_service', function (Blueprint $table) {
            $table->id();

            // Chiavi esterne collegano "apartments" e "services"
            $table->foreignId('apartment_id')->constrained();
            $table->foreignId('service_id')->constrained();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apartment_service');
        Schema::dropIfExists('services');
    }
};
