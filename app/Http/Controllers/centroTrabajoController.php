<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CentroTrabajo;
use App\NivelRiesgo;

class centroTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centrosTrabajo = CentroTrabajo::where('alive',true)->orderby('centroTrabajo')->get();

        return view('configuracion.centroTrabajo.index')
            ->with('centrosTrabajo',$centrosTrabajo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $riesgos = NivelRiesgo::where('alive',true)->pluck('riesgo','id');

        return view('configuracion.centroTrabajo.create')
            ->with('riesgos',$riesgos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $centroTrabajo = new CentroTrabajo();

        $centroTrabajo->identificador = $request->identificador;
        $centroTrabajo->centroTrabajo = $request->centroTrabajo;
        $centroTrabajo->nivelRiesgo_id = $request->riesgo;
        $centroTrabajo->save();

        flash('Centro de trabajo <b>'.$centroTrabajo->centroTrabajo.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('centroTrabajo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riesgos = NivelRiesgo::where('alive',true)->pluck('riesgo','id');
        $centroTrabajo = CentroTrabajo::find($id);

        return view('configuracion.centroTrabajo.show')
            ->with('centroTrabajo',$centroTrabajo)
            ->with('riesgos',$riesgos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $riesgos = NivelRiesgo::where('alive',true)->pluck('riesgo','id');
        $centroTrabajo = CentroTrabajo::find($id);

        return view('configuracion.centroTrabajo.edit')
            ->with('centroTrabajo',$centroTrabajo)
            ->with('riesgos',$riesgos);
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
        $centroTrabajo = CentroTrabajo::find($id);

        $centroTrabajo->identificador = $request->identificador;
        $centroTrabajo->centroTrabajo = $request->centroTrabajo;
        $centroTrabajo->nivelRiesgo_id = $request->riesgo;
        $centroTrabajo->save();

        flash('Centro de trabajo <b>'.$centroTrabajo->centroTrabajo.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('centroTrabajo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $centroTrabajo = CentroTrabajo::find($id);

        $centroTrabajo->alive = false;
        $centroTrabajo->save();

        flash('Centro de trabajo <b>'.$centroTrabajo->centroTrabajo.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('centroTrabajo.index');
    }
}
