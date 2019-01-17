<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
	protected $table = 'historials';

	protected $fillable = [
		'id',
		'producto_id',
		'tipo',
		'descripcion'
	];

	public function producto() {
		return $this->belongsTo('App\Producto');
	}

}
