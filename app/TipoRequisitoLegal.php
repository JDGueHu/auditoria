<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoRequisitoLegal extends Model
{
    protected $table = "tipo_requisito_legal";

	public function RequisitoLegal()
	{
		return $this->hasMany('App\Requisitolegal', 'tipo_requisito_legal_id','id');
	}
}
