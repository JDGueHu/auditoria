<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVacaciones extends Model
{
	protected $table = "tiposVacaciones";

	public function Vacacion()
	{
		return $this->hasMany('App\Vacacion', 'tipoVacaciones_id','id');
	}
}
