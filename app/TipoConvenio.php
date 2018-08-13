<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoConvenio extends Model
{
    //
    protected $table="tipoconvenio";

    protected $fillable=[
    	'id',
    	'convenio_id',
    	'desc_prod',
    	'num_prod',
    	'nombre',
    	'desc_cita',
    	'num_cita',
    	'descripcion',
    	'valido_inicio',
    	'valido_fin',
    	'aplican'
    ];

    protected $hidden = [
    	'created_at',
    	'updated_at'
    ];

    public function convenio(){
    	return $this->belongsTo('App\Convenio','convenio_id');
    }
}
