<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDocumento;

class tiposDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposDocumento = TipoDocumento::where('alive',true)->get();
        return view('configuracion.tiposDocumento.index')->with('tiposDocumento',$tiposDocumento);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.tiposDocumento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoDocumento = new TipoDocumento();

        $tipoDocumento->sigla = $request->sigla;
        $tipoDocumento->tipoDocumento = $request->tipoDocumento;
        $tipoDocumento->save();

        flash('Tipo de documento <b>'.$tipoDocumento->tipoDocumento.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('tiposDocumento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoDocumento = TipoDocumento::find($id);

        return view('configuracion.tiposDocumento.show')->with('tipoDocumento',$tipoDocumento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDocumento = TipoDocumento::find($id);

        return view('configuracion.tiposDocumento.edit')->with('tipoDocumento',$tipoDocumento);
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
        $tipoDocumento = TipoDocumento::find($id);

        $tipoDocumento->sigla = $request->sigla;
        $tipoDocumento->tipoDocumento = $request->tipoDocumento;
        $tipoDocumento->save();

        flash('Tipo de documento <b>'.$tipoDocumento->tipoDocumento.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('tiposDocumento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoDocumento = TipoDocumento::find($id);

        $tipoDocumento->alive = false;
        $tipoDocumento->save();

        flash('Tipo de documento <b>'.$tipoDocumento->tipoDocumento.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('tiposDocumento.index');
    }
}
