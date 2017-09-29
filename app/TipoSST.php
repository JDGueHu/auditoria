<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSST extends Model
{
	protected $table = "tiposSST";

	public function SST()
	{
		return $this->hasMany('App\SST', 'tipoSST_id','id');
	}

}
