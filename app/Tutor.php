<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Tutor extends Model
{
    use Sortable;
    
    protected $table = 'tutors';
    
    protected $fillable = [
    	'id',
    	'nombre',
    	'appaterno',
    	'apmaterno',
    	'edad',
    	'fecha_nacimiento',
    	'sexo',
    	'tel_casa',
    	'tel_cel'
    ];

    protected $hidden = ['created_at'];

    public $sortable = ['id', 'nombre', 'appaterno'];

    public function pacientes() {
        return $this->belongsToMany('App\Paciente')->as('parentesco');
    }

}
