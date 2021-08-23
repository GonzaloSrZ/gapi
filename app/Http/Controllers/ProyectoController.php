<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Publicacion;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::all();

        foreach ($proyectos as $proyecto){
            if ($proyecto->estado==0){
                $proyecto->estado='Iniciado';
            }
            elseif($proyecto->estado==1){
                $proyecto->estado='En curso';
            }
            else{
                $proyecto->estado='Finalizado';
            }
        }
        return view('proyecto.index')->with('proyectos',$proyectos);
    }

    public function crear($id)
    {
        $proyecto = Proyecto::find($id);
        return view('proyecto.crearp')->with('proyecto',$proyecto);
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
        $publicaciones->proyecto_id = $request->get('idproy');
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
        $publicaciones = new Publicacion();
        $publicaciones->titulo = $request->get('titulo');
        $publicaciones->descripcion = $request->get('descripcion');
        $publicaciones->user_dni = $request->get('dni');
        $publicaciones->proyecto_id = $request->get('idproy');

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
        $proyecto = Proyecto::find($id);
        if ($proyecto->estado==0){
            $proyecto->estado='Iniciado';
        }
        elseif($proyecto->estado==1){
            $proyecto->estado='En curso';
        }
        else{
            $proyecto->estado='Finalizado';
        }
        return view('proyecto.show')->with('proyecto',$proyecto);
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
        //
    }
}
