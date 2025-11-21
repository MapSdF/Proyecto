<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sol_ficha_ds', function (Blueprint $table) {
            // Llave primaria correcta
            $table->unsignedInteger('no_solicitud')->primary();
            
            $table->integer('cuartos_casa');
            $table->integer('personas_casa');
            $table->integer('personas_dependen');
            $table->string('tipo_sangre', 20);
            $table->string('comunicar_con', 100);
            $table->string('calle_no', 80);
            $table->string('colonia', 40);
            $table->string('codigo_postal', 5);
            $table->string('municipio', 50);
            $table->string('entidad_federativa', 50);
            $table->string('telefono', 30);
            $table->string('lugar_trabajo', 50);
            $table->string('telefono_trabajo', 30);
            $table->string('periodo', 5);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sol_ficha_ds');
    }
};
