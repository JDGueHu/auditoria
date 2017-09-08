<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroTrabajo extends Model
{
	protected $table = "centrosTrabajo";
	protected $fillable = ['identificador','centroTrabajo','nivelRiesgo_id'];

	public function NivelRiesgo()
    {
        return $this->belongsTo('App\NivelRiesgo','nivelRiesgo_id');
    }

	public function Empleados()
	{
		return $this->hasMany('App\Empleado', 'centro_trabajo_id','id');
	}
}
