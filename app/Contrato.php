<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
	protected $table = "contratos";

	public function Empleado()
    {
        return $this->belongsTo('App\Empleado','empleado_id');
    }

	public function tipoContrato()
    {
        return $this->belongsTo('App\TipoContrato','tipoContrato_id');
    }

}
