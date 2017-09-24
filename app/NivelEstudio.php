<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelEstudio extends Model
{
	protected $table = "nivelesEstudio";

	public function Formaciones()
	{
		return $this->hasMany('App\Formacion', 'nivelEstudio_id','id');
	}
}
