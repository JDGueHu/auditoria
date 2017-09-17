<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\TipoContrato;

class TipoContrato extends Model
{
	protected $table = "tiposContrato";
	protected $fillable = ['codigo','tipoContrato'];

	public function Contratos()
	{
		return $this->hasMany('App\Contrato', 'tipoContrato_id','id');
	}

}
