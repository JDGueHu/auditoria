<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaEstudio extends Model
{
    protected $table = "areasEstudio";

	public function Formaciones()
	{
		return $this->hasMany('App\Formacion', 'areaEstudio_id','id');
	}
}
