<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requisitolegal;
use App\TipoRequisitoLegal;
use App\AutoridadRequisitoLegal;

class requisitosLegalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitos = Requisitolegal::where('alive',true)->get();

        return view('matrices.requisitosLegales.index')
            ->with('requisitos',$requisitos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_requisito = TipoRequisitoLegal::where('alive',true)->pluck('tipo_requisito_legal','id');
        $autoridades = AutoridadRequisitoLegal::where('alive',true)->pluck('tipo_autoridad','id');

        return view('matrices.requisitosLegales.create')
            ->with('tipos_requisito',$tipos_requisito)
            ->with('autoridades',$autoridades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requisito = new Requisitolegal();
        //dd($request);
        $requisito->tipo_requisito_legal_id = $request->tipo_requisito_legal_id;
        $requisito->numero_fecha = $request->numero_fecha;
        $requisito->articulo = $request->articulo;
        $requisito->autoridad_requisito_legal_id = $request->autoridad_requisito_legal_id;
        $requisito->sst = $request->sst == '1' ? true : false;
        $requisito->amb = $request->amb == '1' ? true : false;
        $requisito->cal = $request->cal == '1' ? true : false;
        $requisito->cult = $request->cult == '1' ? true : false;
        $requisito->tur = $request->tur == '1' ? true : false;
        $requisito->eco = $request->eco == '1' ? true : false;
        $requisito->otr = $request->otr == '1' ? true : false;
        $requisito->contenido = $request->contenido;
        $requisito->estado = $request->estado;
        $requisito->cumplimiento = $request->cumplimiento;
        $requisito->responsable = $request->responsable;
        $requisito->evidencia_cumplimiento = $request->evidencia_cumplimiento;
        $requisito->plan_accion = $request->plan_accion;
        $requisito->save();

        flash('Requisito legal se creó exitosamente', 'success')->important();
        return redirect()->route('requisitosLegales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisito = Requisitolegal::find($id);
        $tipos_requisito = TipoRequisitoLegal::where('alive',true)->pluck('tipo_requisito_legal','id');
        $autoridades = AutoridadRequisitoLegal::where('alive',true)->pluck('tipo_autoridad','id');

        return view('matrices.requisitosLegales.show')
            ->with('requisito',$requisito)
            ->with('tipos_requisito',$tipos_requisito)
            ->with('autoridades',$autoridades);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requisito = Requisitolegal::find($id);
        $tipos_requisito = TipoRequisitoLegal::where('alive',true)->pluck('tipo_requisito_legal','id');
        $autoridades = AutoridadRequisitoLegal::where('alive',true)->pluck('tipo_autoridad','id');

        return view('matrices.requisitosLegales.edit')
            ->with('requisito',$requisito)
            ->with('tipos_requisito',$tipos_requisito)
            ->with('autoridades',$autoridades);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requisito = Requisitolegal::find($id);

        $requisito->tipo_requisito_legal_id = $request->tipo_requisito_legal_id;
        $requisito->numero_fecha = $request->numero_fecha;
        $requisito->articulo = $request->articulo;
        $requisito->autoridad_requisito_legal_id = $request->autoridad_requisito_legal_id;
        $requisito->sst = $request->sst == '1' ? true : false;
        $requisito->amb = $request->amb == '1' ? true : false;
        $requisito->cal = $request->cal == '1' ? true : false;
        $requisito->cult = $request->cult == '1' ? true : false;
        $requisito->tur = $request->tur == '1' ? true : false;
        $requisito->eco = $request->eco == '1' ? true : false;
        $requisito->otr = $request->otr == '1' ? true : false;
        $requisito->contenido = $request->contenido;
        $requisito->estado = $request->estado;
        $requisito->cumplimiento = $request->cumplimiento;
        $requisito->responsable = $request->responsable;
        $requisito->evidencia_cumplimiento = $request->evidencia_cumplimiento;
        $requisito->plan_accion = $request->plan_accion;
        $requisito->save();

        flash('Requisito legal se editó exitosamente', 'warning')->important();
        return redirect()->route('requisitosLegales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requisito = Requisitolegal::find($id);

        $requisito->alive = false;
        $requisito->save();

        flash('Requisito legal se eliminó exitosamente', 'danger')->important();
        return redirect()->route('requisitosLegales.index');
    }

    public function matriz()
    {
        $requisitos = Requisitolegal::where('alive',true)->get();

        return view('matrices.requisitosLegales.matriz')
            ->with('requisitos',$requisitos);
    }
}
