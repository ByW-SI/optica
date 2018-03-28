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
    	              'id',
    	              'nombre',
    	              'appaterno',
    	              'apmaterno',
    	              'identificador',
    	              'fecha_nacimiento',
    	              'edad',
    	              'sexo'];

    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];
    public $sortable=['id','nombre', 'identificador','appaterno'];
}
