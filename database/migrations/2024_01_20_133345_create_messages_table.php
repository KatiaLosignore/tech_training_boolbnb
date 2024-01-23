<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            // Chiave esterna collegata alla tabella "apartments"
            $table->foreignId('apartment_id')->nullable()->constrained();

            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->text('text');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
