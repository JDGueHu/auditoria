<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacacion extends Model
{
	protected $table = "vacaciones";

	public function Empleado()
    {
        return $this->belongsTo('App\Empleado','empleado_id');
    }

	public function TipoVacaciones()
    {
        return $this->belongsTo('App\TipoVacaciones','tipoVacaciones_id');
    }
}
