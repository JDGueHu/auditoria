<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
	protected $table = "tiposContrato";
	protected $fillable = ['codigo','tipoContrato'];
}
