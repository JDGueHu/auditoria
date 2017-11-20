<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EPS;

class epsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $epss = EPS::get();

        return view('configuracion.eps.index')
            ->with('epss',$epss);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.eps.create');
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

            $eps = new EPS();

            $eps->codigo = $request->codigo;
            $eps->eps = strtoupper($request->eps);
            $eps->save();

            flash('EPS <b>'.$eps->eps.'</b> se creó exitosamente', 'success')->important();
            return redirect()->route('eps.index');

        }catch(\Exception $e){
            return redirect()->route('validar_duplicado_backend',['tipo_error' => $e->errorInfo[0],'ruta' => 'eps.index','modulo' => 'EPS','dato' => strtoupper($request->eps)]);
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
        $eps = EPS::find($id);

        return view('configuracion.eps.show')->with('eps',$eps);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eps = EPS::find($id);

        return view('configuracion.eps.edit')->with('eps',$eps);
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
        $eps = EPS::find($id);

        $eps->codigo = $request->codigo;
        $eps->eps = strtoupper($request->eps);
        $eps->save();

        flash('EPS <b>'.$eps->eps.'</b> se edito exitosamente', 'warning')->important();
        return redirect()->route('eps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eps = EPS::find($id);

        $eps->alive = false;
        $eps->save();

        flash('EPS <b>'.$eps->eps.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('eps.index');
    }

    public function activar($id)
    {
        $eps = EPS::find($id);

        $eps->alive = true;
        $eps->save();

        flash('EPS <b>'.$eps->eps.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('eps.index');
    }
}
