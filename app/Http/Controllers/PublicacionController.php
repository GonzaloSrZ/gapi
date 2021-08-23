<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Publicacion as ModelsPublicacion;
use Illuminate\Http\Request;
use App\Models\Publicacion;
use App\Models\Subproyecto;


class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicaciones = Publicacion::all();
        foreach ($publicaciones as $publicacion){
            if ($publicacion->subproyecto_id==''){
                $proyecto = Proyecto::find($publicacion->proyecto_id);
                $publicacion->proyecto_id = $proyecto->titulo;
            }
            else{
                $subproyecto = Subproyecto::find($publicacion->subproyecto_id);
                $publicacion->subproyecto_id = $subproyecto->titulo;
            }
        }
        return view('publicacion.index')->with('publicaciones',$publicaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idproy)
    {
        return view('publicacion.create')->with('proyecto',$idproy);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publicaciones = new Publicacion();
        $publicaciones->titulo = $request->get('titulo');
        $publicaciones->descripcion = $request->get('descripcion');
        $publicaciones->user_dni = $request->get('dni');

       // $publicaciones->fechadepublicacion = $request->get('fecha');

        $publicaciones->save();

        return redirect('/publicaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicacion = Publicacion::find($id);
       
            if ($publicacion->subproyecto_id==''){
                $proyecto = Proyecto::find($publicacion->proyecto_id);
                $publicacion->proyecto_id = $proyecto->titulo;
            }
            else{
                $subproyecto = Subproyecto::find($publicacion->subproyecto_id);
                $publicacion->subproyecto_id = $subproyecto->titulo;
            }
        
        return view('publicacion.show')->with('publicacion',$publicacion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicacion = Publicacion::find($id);
        return view('publicacion.edit')->with('publicacion',$publicacion);
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
        $publicacion = Publicacion::find($id);
        $publicacion->titulo = $request->get('titulo');
        $publicacion->descripcion = $request->get('descripcion');
        //$publicacion->fechadepublicacion = $request->get('fecha');
        $publicacion->user_dni = $request->get('dni');

        $publicacion->save();

        return redirect('/publicaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publicacion = Publicacion::find($id);
        $publicacion->delete();
        return redirect('/publicaciones');

    }
}
