<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    protected $table = "formaciones";
    protected $fillable = ['adjunto'];

	public function Empleado()
    {
        return $this->belongsTo('App\Empleado','empleado_id');
    }

	public function NivelEstudio()
    {
        return $this->belongsTo('App\NivelEstudio','nivelEstudio_id');
    }

	public function AreaEstudio()
    {
        return $this->belongsTo('App\AreaEstudio','areaEstudio_id');
    }
}
