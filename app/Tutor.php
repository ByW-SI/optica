<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Tutor extends Model
{
     use Sortable, SoftDeletes;

     protected $table = 'tutors';
    protected $fillable=[
    	'paciente_id',
    	'nombre',
    	'appaterno',
    	'apmaterno',
    	'edad',
    	'fecha_nacimiento',
    	'sexo',
    	'relacion',
    	'tel_casa',
    	'tel_cel'
    ];

    protected $hidden=[ 'deleted_at','created_at'];

    public $sortable=['id','paciente_id','relacion','nombre'];

   public function paciente(){
      
        return $this->belongsTo('App\Paciente', 'paciente_id');
    }
}
