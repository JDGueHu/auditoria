<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelRiesgo extends Model
{
	protected $table = "nivelRiesgos";
	protected $fillable = ['riesgo','valor'];

	public function CentrosTrabajo()
	{
		return $this->hasMany('App\CentroTrabajo', 'nivelRiesgo_id','id');
	}
}
