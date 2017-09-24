<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
	protected $table = "empleados";
	//protected $fillable = ['initials','name','zone_type_id','zone_id'];

	public function CentroTrabajo()
    {
        return $this->belongsTo('App\CentroTrabajo','centro_trabajo_id');
    }

	public function Contratos()
	{
		return $this->hasMany('App\Contrato', 'empleado_id','id');
	}

	public function Formaciones()
	{
		return $this->hasMany('App\Contrato', 'empleado_id','id');
	}
}
