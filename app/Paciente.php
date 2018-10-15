<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Paciente extends Model
{
    use Sortable, SoftDeletes;

    protected $table = 'pacientes';
    protected $fillable=[
    	              'nombre',
    	              'appaterno',
    	              'apmaterno',
    	              'identificador',
    	              'fecha_nacimiento',
    	              'edad',
    	              'sexo'];

    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];
    public $sortable=['id','nombre', 'identificador','appaterno'];

    public function generales(){
        return $this->hasOne('App\PacientesDatosGenerales');
    }
    public function medico(){
        return $this->hasMany('App\PacienteHistorialMedico');
    }
    public function ocular(){
        return $this->hasMany('App\PacienteOcular');
    }
     public function tutores(){
        return $this->hasMany('App\Tutor');
    }

    public function anteojo(){
        return $this->hasMany('App\Anteojo');
    }
    public function citas(){
        return $this->hasMany('App\Cita');
    }

    public function crms(){
        return $this->hasMany('App\PacienteCRM');
    }

    public function crm(){
        return $this->hasMany('App\PacienteCRM');
    }

    public function ortopedias(){
        return $this->hasMany('App\PacienteOrtopedia');
    }
}
