<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Adjunto;
use App\Empleado;
use Storage;
use Carbon\Carbon;

class adjuntosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adjuntos = Adjunto::where('alive',true)->get();
        return view('administracion.adjuntos.index')
            ->with('adjuntos',$adjuntos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = DB::table('empleados')
        ->join('tiposDocumento','empleados.tipoDocumento_id','=','tiposDocumento.id')
        ->where('empleados.alive',true)
        ->select('tiposDocumento.tipoDocumento','empleados.identificacion','empleados.nombres','empleados.apellidos')
        ->get();

        return view('administracion.adjuntos.create')
            ->with('empleados',$empleados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $adjunto = new Adjunto();
        $empleado = Empleado::where('identificacion','=',$request->identificacion)->get();
        //dd($request->adjunto);

        // $fecha = Carbon::now(-5)->toDateTimeString(); // Convertir a string fecha
        // $fecha = str_replace ( " ", "_" , $fecha ); // Quitar espacios por guines bajos
        // $fecha = str_replace ( ":", "-" , $fecha ); // Quitar dos puntos por guines

        // //Formato nombre de archivo: fecha actual (YYYY-mm-dd hh:mm:ss), id del empleado y el nombre original del archiyo subido 
        // $name = 'Adjunto'.'.'.$fecha.'_'.$request->adjunto->getClientOriginalName(); 

        // $request->adjunto->storeAs('public',$name); // subir el archivo a la carpeta linkeada

        $adjunto->empleado_id = $empleado[0]->id;
        $adjunto->nombre = $request->nombre;
        $adjunto->adjunto = '/calidad/public/storage/'; //En el metodo de adjuntar se corrige
        $adjunto->detalles = $request->detalles;
        $adjunto->save();

        //Adjuntar archivo y asociarlo a registro creado
        Adjunto::adjuntar($request, 'adjuntos', 'Adjuntos', $adjunto->id);

        flash('Adjunto de <b>'.$empleado[0]->nombres.' '.$empleado[0]->apellidos.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('adjuntos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adjunto = Adjunto::find($id);
        $empleado = DB::table('empleados')
        ->join('tiposDocumento','empleados.tipoDocumento_id','=','tiposDocumento.id')
        ->where('empleados.id','=',$adjunto->empleado_id)
        ->select('tiposDocumento.tipoDocumento','empleados.identificacion','empleados.nombres','empleados.apellidos')
        ->get();

        return view('administracion.adjuntos.show')
            ->with('empleado',$empleado)
            ->with('adjunto',$adjunto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $adjunto = Adjunto::find($id);
        $empleado = Empleado::where('id','=',$adjunto->empleado_id)->get();

        $adjunto->alive = false;
        $adjunto->save();

        flash('Adjunto de <b>'.$empleado[0]->nombres.' '.$empleado[0]->apellidos.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('adjuntos.index');
    }

    public function showAjax($id)
    {

        $adjunto = Adjunto::find($id);

        return $adjunto;
    }
}
