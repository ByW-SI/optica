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
        'rangos_abr',
    	'marca',
        'marca_abr',
    	'modelo',
        'modelo_abr',
        'talla',
        'talla_abr',
    	'color',
        'color_abr',
    	'tratamiento',
        'tratamiento_abr',
    	'medidas',
        'medidas_abr',
        'tipo',
        'tipo_abr',
        'categoria',
        'categoria_abr',
        'periodo',
        'periodo_abr',
        'unidad',
        'renta',
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

}
