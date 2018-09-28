<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Almacen extends Model
{
	use Sortable;
    //
    protected $table = 'almacens';

    protected $fillable = [
    	'id',
        'claveid',
        'nombre',
        'responsable',
        'tipo',
        'calle',
        'numext',
        'numint',
        'colonia',
        'delegacion',
        'ciudad',
        'estado',
        'calle1',
        'calle2',
        'referencia'
        

    ];
    public $sortable = [
    	'id','nombre','tipo','claveid'
    ];

    protected $hidden=[
    	'created_at','updated_at'
    ];
    
    public function gastos(){
        return $this->hasMany('App\Gasto');
    }
   
   
    public function datosLab(){
        return $this->hasMany('App\EmpleadosDatosLab');
    }
   
}
