<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NivelRiesgo;

class nivelRiesgosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivelRiesgos = NivelRiesgo::where('alive',true)->orderby('riesgo')->get();
        return view('configuracion.nivelRiesgos.index')->with('nivelRiesgos',$nivelRiesgos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.nivelRiesgos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nivelRiesgos = new NivelRiesgo();
        $nivelRiesgos->riesgo = $request->riesgo;
        $nivelRiesgos->valor = $request->valor;
        $nivelRiesgos->save();

        flash('Riesgo <b>'.$nivelRiesgos->riesgo.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('nivelRiesgos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nivelRiesgo = NivelRiesgo::find($id);

        return view('configuracion.nivelRiesgos.show')->with('nivelRiesgo',$nivelRiesgo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nivelRiesgo = NivelRiesgo::find($id);

        return view('configuracion.nivelRiesgos.edit')->with('nivelRiesgo',$nivelRiesgo);
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
        $nivelRiesgo = NivelRiesgo::find($id);
        $nivelRiesgo->riesgo = $request->riesgo;
        $nivelRiesgo->valor = $request->valor;
        $nivelRiesgo->save();

        flash('Riesgo <b>'.$nivelRiesgo->riesgo.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('nivelRiesgos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivelRiesgo = NivelRiesgo::find($id);
        $nivelRiesgo->alive = false;
        $nivelRiesgo->save();

        flash('Riesgo <b>'.$nivelRiesgo->riesgo.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('nivelRiesgos.index');
    }
}
