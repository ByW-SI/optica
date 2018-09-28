<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class EmpleadosDatosLab extends Model
{
    //
    use Sortable;

    protected $table='empleadosdatoslab';
    protected $fillable=['id',
                         'empleado_id',
                         'fechacontratacion',
                         'fechaactualizacion',
                         'contrato_id',
                         'area_id',
                         'puesto_id',
                         'salarionom',
                         'salariodia',
                         
                         'periodopaga',
                         'prestaciones',
                         'regimen',
                         'hentrada',
                         'hsalida',
                         'hcomida',
                         'lugartrabajo',
                         'banco',
                         'cuenta',
                         'clabe',
                         'fechabaja',
                         'tipobaja_id',
                         'comentariobaja',
                         'almacen_id',
                         'bonopuntualidad',
                     ];
        
    protected $hidden=['created_at','updated_at'];
    public $sortable=['id'];

    public function empleado(){
    	return $this->belongsTo('App\Empleado');
    }

    public function tipocontrato(){
    	return $this->belongsTo('App\TipoContrato');
    }

    public function tipobaja(){
    	return $this->belongsTo('App\TipoBaja');
    }

    public function areas(){
        return $this->belongsTo('App\Area');
    }

    public function puestos(){ 
        return $this->belongsTo('App\Puesto');
    }

     public function almacen(){
        return $this->belongsTo('App\Almacen');
    }


}
