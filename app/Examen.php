<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
	protected $table = "examenes";

	public function Empleado()
    {
        return $this->belongsTo('App\Empleado','empleado_id');
    }
}
