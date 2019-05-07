<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class OrdenTrabajo extends Model
{
    use Sortable;
    protected $table = 'orden_trabajos';

    protected $fillable = [
    	'id',
    	'fecha_entrega',
    	'fecha_generacion',
    	'ventas_id'
    ];
    
    public $sortable = ['id', 'fecha_entrega', 'fecha_generacion', 'ventas_id'];

    protected $hidden=[ 'created_at', 'updated_at'];

    public function productos()
    {
    	return $this->belongsToMany('App\Producto')->withPivot('cantidad','descuento');
    }

    
}
