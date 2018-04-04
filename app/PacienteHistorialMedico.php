<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;


class PacienteHistorialMedico extends Model
{
    use Sortable, SoftDeletes;

    protected $table = 'paciente_historial_medicos';
    protected $fillable=[
      	              'paciente_id',
    	              'alergia',
    	              'cual_alergia',
    	              'tratamiento_alergia',
    	              'enfermedad',

    	              'enfermedades_array',
                      'enfermedad_cronica',

    	          	  'tratamiento',
    	          	  'tratamiento_actual',
    	          	  'embarazo',
    	          	  'tiempo_embarazo'];

    protected $hidden=[ 'deleted_at'];

    public $sortable=['id','paciente_id','created_at', 'updated_at'];

    public function paciente(){

        return $this->belongsTo('App\PacientesDatosGenerales','paciente_id');

    }
}
