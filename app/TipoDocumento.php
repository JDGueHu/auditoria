<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
	protected $table = "tiposDocumento";
	protected $fillable = ['sigla','tipoDocumento'];

}
