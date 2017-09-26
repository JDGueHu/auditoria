<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoVacaciones;

class tiposVacacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposVacaciones = TipoVacaciones::where('alive',true)->get();

        return view('configuracion.tiposVacaciones.index')
            ->with('tiposVacaciones',$tiposVacaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.tiposVacaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tiposVacaciones = new TipoVacaciones();

        $tiposVacaciones->codigo = $request->codigo;
        $tiposVacaciones->tipoVacaciones = $request->tipoVacaciones;
        $tiposVacaciones->save();

        flash('Tipo de vacaciones <b>'.$tiposVacaciones->tipoVacaciones.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('tiposVacaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoVacaciones = TipoVacaciones::find($id);

        return view('configuracion.tiposVacaciones.show')
            ->with('tipoVacaciones',$tipoVacaciones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoVacaciones = TipoVacaciones::find($id);

        return view('configuracion.tiposVacaciones.edit')
            ->with('tipoVacaciones',$tipoVacaciones);
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
        $tipoVacaciones = TipoVacaciones::find($id);

        $tipoVacaciones->codigo = $request->codigo;
        $tipoVacaciones->tipoVacaciones = $request->tipoVacaciones;
        $tipoVacaciones->save();

        flash('Tipo de vacaciones <b>'.$tipoVacaciones->tipoVacaciones.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('tiposVacaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoVacaciones = TipoVacaciones::find($id);

        $tipoVacaciones->alive = false;
        $tipoVacaciones->save();

        flash('Tipo de vacaciones <b>'.$tipoVacaciones->tipoVacaciones.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('tiposVacaciones.index');
    }
}
