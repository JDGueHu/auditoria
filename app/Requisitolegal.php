<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisitolegal extends Model
{
    protected $table = "requisitos_legales";

	public function tipoRequisito()
    {
        return $this->belongsTo('App\TipoRequisitoLegal','tipo_requisito_legal_id');
    }

	public function autoridad()
    {
        return $this->belongsTo('App\AutoridadRequisitoLegal','autoridad_requisito_legal_id');
    }
}
