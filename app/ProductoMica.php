<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoMica extends Model
{

    protected $table='productomicas';
    protected $fillable=['id','codigobarras','sku','negocio','proveedor', 'descripcion','familia','materiales','rangos', 'color', 'tratamientos', 'unidad'];
    protected $hidden=['updated_at','deleted_at'];
   }
