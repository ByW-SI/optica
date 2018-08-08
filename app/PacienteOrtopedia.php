<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PacienteOrtopedia extends Model
{
    //
    protected $table="paciente_cita_ortopedia";

    protected $fillable=[
    	'fecha',
    	'paciente_id',
    	'cita',
    	'path_image',
        'clinica',
    	'diagnostico',
    	'recomendacion',
    	'tratamiento',
    	'tipo',
    	'medida',
    	'plantilla',
    	'medida_plant'
    ];

    protected $hidden = [
    	'created_at',
    	'updated_at',
    	'deleted_at'
    ];

    public function paciente()
    {
    	return $this->belongsTo('App\Paciente','paciente_id');
    }

}
