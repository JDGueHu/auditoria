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
        $nivelRiesgos = NivelRiesgo::get();
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
        try{

            $nivelRiesgos = new NivelRiesgo();
            $nivelRiesgos->riesgo = strtoupper($request->riesgo);
            $nivelRiesgos->valor = $request->valor;
            $nivelRiesgos->save();

            flash('Nivel de riesgo <b>'.$nivelRiesgos->riesgo.'</b> se creó exitosamente', 'success')->important();
            return redirect()->route('nivelRiesgos.index');

        }catch(\Exception $e){
            return redirect()->route('validar_duplicado_backend',['tipo_error' => $e->errorInfo[0],'ruta' => 'nivelRiesgos.index','modulo' => 'Niveles de riesgos','dato' => strtoupper($request->riesgo)]);
        }
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
        $nivelRiesgo->riesgo = strtoupper($request->riesgo);
        $nivelRiesgo->valor = $request->valor;
        $nivelRiesgo->save();

        flash('Nivel de riesgo <b>'.$nivelRiesgo->riesgo.'</b> se editó exitosamente', 'warning')->important();
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

        flash('Nivel de riesgo <b>'.$nivelRiesgo->riesgo.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('nivelRiesgos.index');
    }

    public function activar($id)
    {
        $nivelRiesgo = NivelRiesgo::find($id);

        $nivelRiesgo->alive = true;
        $nivelRiesgo->save();

        flash('Nivel de riesgo <b>'.$nivelRiesgo->riesgo.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('nivelRiesgos.index');
    }
}
