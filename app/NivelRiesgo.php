<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelRiesgo extends Model
{
	protected $table = "nivelRiesgos";
	protected $fillable = ['initials','name','zone_type_id','zone_id'];
}
