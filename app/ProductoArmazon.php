<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoArmazon extends Model
{

    protected $table='productoarmazons';
    protected $fillable=['id','codigobarras','sku','negocio','proveedor', 'descripcion','marca','modelo','color', 'medidas', 'unidad', 'foto', 'cantidad' ,'precio'];
    protected $hidden=['updated_at','deleted_at'];
    }
