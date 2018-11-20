<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='productos';
    protected $fillable=['id','tipopersona','nombre','apellidopaterno','apellidomaterno', 'razonsocial','alias','rfc','vendedor', 'calle', 'numext', 'numinter','cp','colonia','municipio','ciudad','estado', 'calle1','calle2','referencia'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];
    public $sortable =['id','nombre', 'tipopersona', 'apellidomaterno','apellidopaterno', 'alias', 'rfc', 'razonsocial'];
    
}
