<?php

namespace App;

use App\Convenio;
use Illuminate\Database\Eloquent\Model;

class ConvenioContacto extends Model
{
    //
    protected $table='contactos_convenios';
    protected $fillable=['id','convenio_id','nombre', 'apater', 'amater', 'area','puesto', 'telefono1', 'ext1','telefono2', 'ext2', 'telefonodir', 'celular1','celular2','email1','email2'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];
    public $sortable=['nombre', 'apater', 'amater','area','email1','email2'];

    public function convenio(){
    	return $this->belongsTo(Convenio::class,'convenio_id');
    }
}
