<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{

	protected $table = 'precios';

	protected $fillable = [
		'id',
		'producto_id',
		'precio'
	];

	public function producto() {
		return $this->belongsTo('App\Producto');
	}
}
