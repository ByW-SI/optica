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
    	'familia',
    	'materiales',
    	'rangos',
    	'marca',
    	'modelo',
    	'talla',
    	'color',
    	'tratamiento',
    	'medidas',
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
