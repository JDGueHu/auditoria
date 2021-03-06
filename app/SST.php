<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SST extends Model
{
	protected $table = "SST";

	public function Empleado()
    {
        return $this->belongsTo('App\Empleado','empleado_id');
    }

	public function TipoSST()
    {
        return $this->belongsTo('App\TipoSST','tipoSST_id');
    }
}
