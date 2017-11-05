<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Rol_responsabilidad;
use App\Responsabilidad_rol;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles_responsabilidades = Rol_responsabilidad::where('alive',true)->get();

        return view('matrices.roles.index')
            ->with('roles_responsabilidades',$roles_responsabilidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tmp = uniqid();

        return view('matrices.roles.create')
            ->with('tmp',$tmp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = new Rol_responsabilidad();

        $rol->rol = $request->rol;
        $rol->descripcion = $request->descripcion;
        $rol->save();

        DB::table('responsabilidades_rol')
            ->where('rol_id','=', $request->tmp)
            ->update(['rol_id' => $rol->id]);

        flash('Rol <b>'.$rol->rol.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Rol_responsabilidad::find($id);
        $responsabilidades = Responsabilidad_rol::where('rol_id',$id)->where('alive',true)->get();
       
        return view('matrices.roles.show')
            ->with('rol',$rol)
            ->with('responsabilidades',$responsabilidades);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Rol_responsabilidad::find($id);
        $responsabilidades = Responsabilidad_rol::where('rol_id','=',$rol->id)->where('alive',true)->get();
        $tmp = uniqid();
       
        return view('matrices.roles.edit')
            ->with('rol',$rol)
            ->with('responsabilidades',$responsabilidades)
            ->with('tmp',$tmp);
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
        $rol = Rol_responsabilidad::find($id);

        $rol->rol = $request->rol;
        $rol->descripcion = $request->descripcion;
        $rol->save();

        DB::table('responsabilidades_rol')
            ->where('rol_id','=', $request->tmp)
            ->update(['rol_id' => $rol->id]);

        flash('Rol <b>'.$rol->rol.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Rol_responsabilidad::find($id);
        $rol->alive = false;
        $rol->save();

        flash('Rol <b>'.$rol->rol.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('roles.index');

    }

    public function createResponsabilidadAjax(Request $request)
    {
        if($request->ajax()){ 

            $rol_res = new Responsabilidad_rol();

            $rol_res->rol_id = $request->tmp;
            $rol_res->responsabilidad = $request->responsabilidad;
            $rol_res->save();

            return response($rol_res);

        }
    }

    public function destroyResponsabilidadAjax($id)
    {
        $rol_res = Responsabilidad_rol::find($id);

        $rol_res->alive=false;
        $rol_res->save();

        return response($rol_res);
    }

    public function matriz()
    {
        $roles = Rol_responsabilidad::where('alive',true)->get();
        $responsabilidades = Responsabilidad_rol::where('alive',true)->get();

        return view('matrices.roles.matriz')
            ->with('roles',$roles)
            ->with('responsabilidades',$responsabilidades);
    }

}
