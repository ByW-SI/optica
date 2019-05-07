<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class PacientesDatosGenerales extends Model
{
	use Sortable, SoftDeletes;

	protected $table = 'pacientes_datos_generales';

	protected $fillable = [
		'id',
		'paciente_id',
		'ocupacion',
		'convenio',
		'calle',
		'numext',
		'numint',
		'cp',
		'municipio',
		'estado',
		'telcasa',
		'teloficina',
		'telcelular',
		'email',
		'trabajo',
		'servicio',
	];

	protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

	public $sortable = ['id', 'paciente_id', 'convenio'];

	public function paciente() {
		return $this->belongsTo('App\Paciente');
	}

}