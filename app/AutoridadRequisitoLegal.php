<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoridadRequisitoLegal extends Model
{
    protected $table = "autoridad_requisito_legal";

	public function RequisitoLegal()
	{
		return $this->hasMany('App\Requisitolegal', 'autoridad_requisito_legal_id','id');
	}
}
