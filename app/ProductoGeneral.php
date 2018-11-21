<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoGeneral extends Model
{

    protected $table='productogenerals';
    protected $fillable=['id','codigobarras','sku','negocio','proveedor', 'descripcion','producto','marca','modelo', 'color', 'unidad', 'foto', 'cantidad' ,'precio'];
    protected $hidden=['updated_at','deleted_at'];
    }
