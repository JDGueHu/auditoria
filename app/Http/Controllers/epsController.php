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
        $epss = EPS::where('alive',true)->get();

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
        $eps = new EPS();

        $eps->codigo = $request->codigo;
        $eps->eps = $request->eps;
        $eps->save();

        flash('EPS <b>'.$eps->eps.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('eps.index');
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
        $eps->eps = $request->eps;
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

        flash('EPS <b>'.$eps->eps.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('eps.index');
    }
}
