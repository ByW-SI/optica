<?php

namespace App;

use App\Paciente;
use Illuminate\Database\Eloquent\Model;


class PacienteCRM extends Model
{
     protected $table = 'pacientes_crm';

    protected $fillable=['id', 
                         'paciente_id', 
                         'fecha_act', 
                         'fecha_cont', 
                         'fecha_aviso', 
                         'hora', 
                         'status',
                         'comentarios',
                         'acuerdos',
                         'observaciones',
                         'tipo_cont'];

    protected $hidden = ['created_at','updated_at'];
    
    public function paciente(){
    	return $this->belongsTo(Paciente::class,'paciente_id');
    }

    public function pacientes(){
    	return $this->belongsTo(Cliente::class,'paciente_id');
    }
}
