<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subproyecto;
use App\Models\Publicacion;

class SubproyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subproyectos = Subproyecto::all();
        foreach ($subproyectos as $subproyecto){
            if ($subproyecto->estado==0){
                $subproyecto->estado='Iniciado';
            }
            elseif($subproyecto->estado==1){
                $subproyecto->estado='En curso';
            }
            else{
                $subproyecto->estado='Finalizado';
            }
        }
        return view('subproyecto.index')->with('subproyectos',$subproyectos);
    }

    public function crear($id)
    {
        $subproyecto = Subproyecto::find($id);
        return view('subproyecto.crearp')->with('subproyecto',$subproyecto);
    }

    public function guardar(Request $request)
    {
        $publicaciones = new Publicacion();
        $publicaciones->titulo = $request->get('titulo');
        $publicaciones->descripcion = $request->get('descripcion');
        $publicaciones->autor1 = $request->get('autor1');
        $publicaciones->autor2 = $request->get('autor2');
        $publicaciones->autor3 = $request->get('autor3');
        $publicaciones->nota = $request->get('nota');
        $publicaciones->subproyecto_id = $request->get('idsubp');
        $publicaciones->user_dni = $request->get('dni');

       // $publicaciones->fechadepublicacion = $request->get('fecha');

        $publicaciones->save();

        return redirect()->route('publicaciones.home')->with('confirmacion','ok');
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
        $subproyecto = Subproyecto::find($id);
        if ($subproyecto->estado==0){
            $subproyecto->estado='Iniciado';
        }
        elseif($subproyecto->estado==1){
            $subproyecto->estado='En curso';
        }
        else{
            $subproyecto->estado='Finalizado';
        }
        return view('subproyecto.show')->with('subproyecto',$subproyecto);
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
}
