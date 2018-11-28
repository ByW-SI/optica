<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class ProductoOrto extends Model
{

    protected $table='productoortos';
    protected $fillable=['id','codigobarras','sku','negocio','proveedor', 'descripcion','producto','marca','modelo', 'talla', 'color', 'unidad','foto', 'cantidad' ,'precio'];
    protected $hidden=['updated_at','deleted_at'];
   }
