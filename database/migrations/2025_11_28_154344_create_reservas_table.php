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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sala_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('telefono');
            $table->date('fecha');
            $table->enum('hora' , ['9:00', '10:00', '11:00', '12:00' , '13:00' , '16:00' , '17:00' , '18:00']);
            $table->tinyInteger('numpersonas');
            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
