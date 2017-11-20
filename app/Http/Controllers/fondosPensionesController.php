<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FondosPensiones;

class fondosPensionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fondosPensiones = FondosPensiones::get();

        return view('configuracion.fondosPensiones.index')
            ->with('fondosPensiones',$fondosPensiones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.fondosPensiones.create');
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

            $fondoPensiones = new FondosPensiones();

            $fondoPensiones->codigo = $request->codigo;
            $fondoPensiones->fondosPensiones = strtoupper($request->fondoPensiones);
            $fondoPensiones->save();

            flash('Fondo de pensiones <b>'.$fondoPensiones->fondoPensiones.'</b> se creó exitosamente', 'success')->important();
            return redirect()->route('fondosPensiones.index');

        }catch(\Exception $e){
            return redirect()->route('validar_duplicado_backend',['tipo_error' => $e->errorInfo[0],'ruta' => 'fondosPensiones.index','modulo' => 'Fondos de pensiones','dato' => strtoupper($request->fondoPensiones)]);
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
        $fondoPensiones = FondosPensiones::find($id);

        return view('configuracion.fondosPensiones.show')->with('fondoPensiones',$fondoPensiones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fondoPensiones = FondosPensiones::find($id);

        return view('configuracion.fondosPensiones.edit')->with('fondoPensiones',$fondoPensiones);
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
        $fondoPensiones = FondosPensiones::find($id);

        $fondoPensiones->codigo = $request->codigo;
        $fondoPensiones->fondosPensiones = strtoupper($request->fondoPensiones);
        $fondoPensiones->save();

        flash('Fondo de pensiones <b>'.$fondoPensiones->fondosPensiones.'</b> se edito exitosamente', 'warning')->important();
        return redirect()->route('fondosPensiones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fondoPensiones = FondosPensiones::find($id);

        $fondoPensiones->alive = false;
        $fondoPensiones->save();

        flash('Fondo de penciones <b>'.$fondoPensiones->fondosPensiones.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('fondosPensiones.index');
    }

    public function activar($id)
    {
        $fondoPensiones = FondosPensiones::find($id);

        $fondoPensiones->alive = true;
        $fondoPensiones->save();

        flash('Fondo de penciones <b>'.$fondoPensiones->fondosPensiones.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('fondosPensiones.index');
    }
}
