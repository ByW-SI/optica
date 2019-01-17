<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PacienteTutor extends Model
{

	protected $table = 'paciente_tutor';

	protected $fillable = [
		'id',
		'paciente_id',
		'tutor_id',
		'relacion'
	];

	public function paciente() {
		return $this->belongsTo('App\Paciente');
	}

	public function tutor() {
		return $this->belongsTo('App\Tutor');
	}

}
