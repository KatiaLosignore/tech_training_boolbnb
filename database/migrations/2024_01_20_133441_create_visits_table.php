<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();

            // Chiave esterna collegata alla tabella "apartments"
            $table->foreignId('apartment_id')->constrained();

            $table->ipAddress('ip');
            $table->timestamp('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visits');
    }
};
