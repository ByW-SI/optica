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
        'medidas_abr',
    	'unidad',
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
