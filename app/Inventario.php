<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
	protected $table = 'inventarios';

	protected $fillable = [
		'id',
		'producto_id',
		'cantidad'
	];

	public function producto() {
		return $this->belongsTo('App\Producto');
	}

}
