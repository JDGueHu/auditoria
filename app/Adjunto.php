<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adjunto extends Model
{
	protected $table = "adjuntos";

	public function Empleado()
    {
        return $this->belongsTo('App\Empleado','empleado_id');
    }
}
