<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $table = 'productos';

    protected $fillable = [
    	'id',
    	'seccion',
        'sku',
        'sku_interno',
    	'negocio',
    	'provedor_id',
    	'descripcion',
    	'producto',
        'producto_abr',
        'familia',
        'familia_abr',
    	'materiales',
        'materiales_abr',
        'rangos',
    	'marca',
        'marca_abr',
    	'modelo',
        'modelo_abr',
        'talla',
    	'color',
        'color_abr',
    	'tratamiento',
        'tratamiento_abr',
    	'medidas',
        'tipo',
        'tipo_abr',
        'categoria',
        'categoria_abr',
        'periodo',
        'periodo_abr',
        'unidad',
        'renta',
        'esf_min',
        'esf_max',
        'cil_min',
        'cil_max',
        'com_max',
        'add_min',
        'add_max',
    	'foto1',
    	'foto2',
    	'foto3'
    ];

    public function precio() {
    	return $this->hasOne('App\Precio');
    }

    public function inventario() {
    	return $this->hasOne('App\Inventario');
    }
    
    public function historiales() {
    	return $this->hasMany('App\Historial');
    }
    
    public function provedor() {
        return $this->belongsTo('App\Provedor');
    }

    public function ventas()
    {
        return $this->belongsToMany('App\Ventas')->withPivot('cantidad');
    }

    public function OrdenTrabajo()
    {
        return $this->belongsToMany('App\OrdenTrabajo');
    }

}
