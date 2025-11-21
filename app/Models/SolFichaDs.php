<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolFichaDs extends Model
{
    protected $table = 'sol_ficha_ds';
    
    // La llave primaria es no_solicitud
    protected $primaryKey = 'no_solicitud';
    
    // NO es autoincremental
    public $incrementing = false;
    
    // Tipo de la llave primaria
    protected $keyType = 'integer';
    
    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'no_solicitud',
        'cuartos_casa',
        'personas_casa',
        'personas_dependen',
        'tipo_sangre',
        'comunicar_con',
        'calle_no',
        'colonia',
        'codigo_postal',
        'municipio',
        'entidad_federativa',
        'telefono',
        'lugar_trabajo',
        'telefono_trabajo',
        'periodo',
    ];
    
    // Habilitar timestamps (created_at, updated_at)
    public $timestamps = true;
}