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
}
