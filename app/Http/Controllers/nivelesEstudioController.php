<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NivelEstudio;

class nivelesEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivelesEstudio = NivelEstudio::where('alive',true)->orderby('orden')->get();

        return view('configuracion.nivelesEstudio.index')
            ->with('nivelesEstudio',$nivelesEstudio);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.nivelesEstudio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nivelEstudio = new NivelEstudio();

        $nivelEstudio->codigo = $request->codigo;
        $nivelEstudio->nivelEstudio = $request->nivelEstudio;
        $nivelEstudio->orden = $request->orden;
        $nivelEstudio->tipoEstudio = $request->tipoEstudio;
        $nivelEstudio->save();

        flash('Nivel de formación <b>'.$nivelEstudio->nivelEstudio.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('nivelesEstudio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nivelEstudio = NivelEstudio::find($id);

        return view('configuracion.nivelesEstudio.show')
            ->with('nivelEstudio',$nivelEstudio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $nivelEstudio = NivelEstudio::find($id);

        return view('configuracion.nivelesEstudio.edit')
            ->with('nivelEstudio',$nivelEstudio);
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
        $nivelEstudio = NivelEstudio::find($id);

        $nivelEstudio->codigo = $request->codigo;
        $nivelEstudio->nivelEstudio = $request->nivelEstudio;
        $nivelEstudio->orden = $request->orden;
        $nivelEstudio->tipoEstudio = $request->tipoEstudio;
        $nivelEstudio->save();

        flash('Nivel de formación <b>'.$nivelEstudio->nivelEstudio.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('nivelesEstudio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivelEstudio = NivelEstudio::find($id);

        $nivelEstudio->alive = false;
        $nivelEstudio->save();

        flash('Nivel de formación <b>'.$nivelEstudio->nivelEstudio.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('nivelesEstudio.index');
    }
}
