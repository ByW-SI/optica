<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    protected $table = 'orden_trabajos';

    protected $fillable = [
    	'id',
    	'descripcion_producto',
    	'sku',
    	'cantidad',
    	'descuento'
    ];
    
    protected $hidden=[ 'created_at', 'updated_at'];

    public function productos()
    {
    	return $this->belongsToMany('App\Producto')->withPivot('cantidad');
    }

    
}
