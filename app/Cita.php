<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Cita extends Model
{
    use Sortable, SoftDeletes;

    protected $table = 'citas';
    protected $fillable=['paciente_id',
						 'proxima_cita',
						 'hora',
						 'minutos',
						 'sucursal_clave',
						 'comentarios'];

	protected $hidden=['updated_at','deleted_at'];
    public $sortable=['paciente_id','proxima_cita','hora','sucursal_clave'];

    public function paciente(){
    	 return $this->belongsTo('App\Paciente');
    }
}
