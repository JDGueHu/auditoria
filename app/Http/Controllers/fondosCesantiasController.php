<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FondosCesantias;

class fondosCesantiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fondosCesantias = FondosCesantias::where('alive',true)->get();

        return view('configuracion.fondosCesantias.index')
            ->with('fondosCesantias',$fondosCesantias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.fondosCesantias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fondoCesantias = new FondosCesantias();

        $fondoCesantias->codigo = $request->codigo;
        $fondoCesantias->fondosCesantias = $request->fondoCesantias;
        $fondoCesantias->save();

        flash('Fondo de cesantías <b>'.$fondoCesantias->fondosCesantias.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('fondosCesantias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fondoCesantias = FondosCesantias::find($id);

        return view('configuracion.fondosCesantias.show')->with('fondoCesantias',$fondoCesantias);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fondoCesantias = FondosCesantias::find($id);

        return view('configuracion.fondosCesantias.edit')->with('fondoCesantias',$fondoCesantias);
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
        $fondoCesantias = FondosCesantias::find($id);

        $fondoCesantias->codigo = $request->codigo;
        $fondoCesantias->fondosCesantias = $request->fondoCesantias;
        $fondoCesantias->save();

        flash('Fondo de cesantías <b>'.$fondoCesantias->fondosCesantias.'</b> se edito exitosamente', 'warning')->important();
        return redirect()->route('fondosCesantias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fondoCesantias = FondosCesantias::find($id);

        $fondoCesantias->alive = false;
        $fondoCesantias->save();

        flash('Fondo de cesantías <b>'.$fondoCesantias->fondosCesantias.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('fondosCesantias.index');
    }
}
