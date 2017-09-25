<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RestriccionMedica;

class restriccionesMedicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createAjax(request $request)
    {
        if($request->ajax()){    

            $restriccion = new RestriccionMedica();

            $restriccion->restriccion = $request->restriccion;
            $restriccion->id_examen = $request->tmp;
            $restriccion->save();

            return response($restriccion);
        }
    }

    public function destroyAjax($id)
    {

        $restriccion = RestriccionMedica::find($id);

        $restriccion->alive = false;
        $restriccion->save();

        return response($restriccion);
    }
}
