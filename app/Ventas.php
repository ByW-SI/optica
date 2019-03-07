<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;

class Ventas extends Model
{
    protected $table="ventas";

    protected $fillable=[
    	'id',
    	'fecha_venta',
    	'sucursal',  //Este campo en la tabla de sucursals se llama claveid
    	'numero_venta',
    	'id_paciente',
    	'fecha_entrega',
    	'tipo_convenio',
    	'cantidad_tramites',
    	'numero_autorizacion',
    	'personal',
    	'convenio',
        'subtotal',
        'total',
        'monto_convenio',
        'total_pagar',
        'forma_pago',
        'num_tarjeta',
        'nombre_dueño_tarjeta',
        'banco',
        'ultimos_digitos',
        'monto_pagar',
        'numero_refrerencia',
        'saldo',
        'fecha_deposito'

    ];

    protected $hidden = [
    	'created_at',
    	'updated_at'
    ];

    public function productos()
    {
    	return $this->belongsToMany('App\Producto')->withPivot('cantidad');
    }
}
