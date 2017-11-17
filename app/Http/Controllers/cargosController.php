<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;

class cargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::get();

        return view('configuracion.cargos.index')->with('cargos',$cargos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.cargos.create');
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

        $cargo = new Cargo();

        $cargo->codigo = $request->codigo;
        $cargo->cargo = strtoupper($request->cargo);
        $cargo->save();

        flash('Cargo <b>'.$cargo->cargo.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('cargos.index');

        }catch(\Exception $e){
            return redirect()->route('validar_duplicado_backend',['tipo_error' => $e->errorInfo[0],'ruta' => 'cargos.index','modulo' => 'Cargos','dato' => strtoupper($request->cargo)]);
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
        $cargo = Cargo::find($id);

        return view('configuracion.cargos.show')->with('cargo',$cargo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargo = Cargo::find($id);

        return view('configuracion.cargos.edit')->with('cargo',$cargo);
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
        $cargo = Cargo::find($id);

        $cargo->codigo = $request->codigo;
        $cargo->cargo = strtoupper($request->cargo);
        $cargo->save();

        flash('Cargo <b>'.$cargo->cargo.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('cargos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargo = Cargo::find($id);

        $cargo->alive = false;
        $cargo->save();

        flash('Cargo <b>'.$cargo->cargo.'</b> se eliminó inactivó', 'danger')->important();
        return redirect()->route('cargos.index');
    }

    public function activar($id)
    {
        $cargo = Cargo::find($id);

        $cargo->alive = true;
        $cargo->save();

        flash('Cargo <b>'.$cargo->cargo.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('cargos.index');
    }
}
