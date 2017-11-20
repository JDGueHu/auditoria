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
        $fondosCesantias = FondosCesantias::get();

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
        try{

            $fondoCesantias = new FondosCesantias();

            $fondoCesantias->codigo = $request->codigo;
            $fondoCesantias->fondosCesantias = strtoupper($request->fondoCesantias);
            $fondoCesantias->save();

            flash('Fondo de cesantías <b>'.$fondoCesantias->fondosCesantias.'</b> se creó exitosamente', 'success')->important();
            return redirect()->route('fondosCesantias.index');

        }catch(\Exception $e){
            return redirect()->route('validar_duplicado_backend',['tipo_error' => $e->errorInfo[0],'ruta' => 'fondosCesantias.index','modulo' => 'Fondos de cesantias','dato' => strtoupper($request->fondoCesantias)]);
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
        $fondoCesantias->fondosCesantias = strtoupper($request->fondoCesantias);
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

        flash('Fondo de cesantías <b>'.$fondoCesantias->fondosCesantias.'</b> se inhabilitó exitosamente', 'danger')->important();
        return redirect()->route('fondosCesantias.index');
    }

    public function activar($id)
    {
        $fondoCesantias = FondosCesantias::find($id);

        $fondoCesantias->alive = true;
        $fondoCesantias->save();

        flash('Fondo de cesantías <b>'.$fondoCesantias->fondosCesantias.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('fondosCesantias.index');
    }
}
