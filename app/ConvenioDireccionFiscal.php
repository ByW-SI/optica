<?php

namespace App;

use App\Convenio;
use Illuminate\Database\Eloquent\Model;

class ConvenioDireccionFiscal extends Model
{
    //
    protected $table='direccion_fiscal_convenios';
    protected $fillable=['id','convenio_id','calle','numext','numint', 'colonia','municipio','ciudad','estado', 'referencia', 'calle1', 'calle2', 'cp'];
    protected $hidden=[ 'created_at', 'updated_at'];

    public function convenio(){
    	return $this->belongsTo(Convenio::class, 'convenio_id');
    }
}
