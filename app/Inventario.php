<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
	protected $table = 'inventarios';

	protected $fillable = [
		'id',
		'producto_id',
		'cantidad',
		'sucursal_id',
		'num_compra',
		'codigo'
	];

	public function producto() {
		return $this->belongsTo('App\Producto');
	}

	public function sucursal() {
		return $this->belongsTo('App\Sucursal');
	}

}
