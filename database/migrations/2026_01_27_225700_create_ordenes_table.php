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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();

            
            // Relación con Trabajador (1:N - Un trabajador tiene muchas órdenes)
            $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
            
            // Relación con Proyecto (N:1 - Una orden necesita un proyecto)
            $table->foreignId('proyecto_id')->constrained('proyectos')->onDelete('cascade');
            $table->text('actividad');

            $table->string('lugar_cita');
            $table->date('fecha_cita');
            
            $table->date('fecha_solicitud');
            
            $table->time('hora_primer_tiro')->nullable();
            $table->time('hora_catering')->nullable();
            $table->time('hora_reinicio')->nullable();
            $table->time('hora_ultimo_tiro')->nullable();

            $table->text('observaciones')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes');
    }
};
