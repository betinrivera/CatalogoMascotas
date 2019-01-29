<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Usar el modelo
use App\Mascota;
use App\Especie;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Trae todos los registros
        $mascotas = Mascota::orderBy('id','desc')->get();

        //Creamos los argumentos que le enviaremos
        //a la vista
        $argumentos = array();
        $argumentos['mascotas'] = $mascotas;

        //Creamos la vista
        return view('mascotas.index',$argumentos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especies = Especie::all();

        $argumentos = array();
        $argumentos['especies'] = $especies;

        return view('mascotas.create', $argumentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Creando instancia
        $nuevaMascota = new Mascota();
        //Los parametros del input son los 'name' de los
        //inputs
        $nuevaMascota->id_especie = 
            $request->input('especie');
        $nuevaMascota->nombre = 
            $request->input('nombre');
        $nuevaMascota->precio = 
            $request->input('precio');
        $nuevaMascota->nacimiento = 
            $request->input('nacimiento');

            //Guardar el nuevo registro
            $nuevaMascota->save();

            return redirect()->route('mascotas.index');

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
        $especies = Especie::all();
        $mascota = Mascota::find($id);

        $argumentos = array();
        $argumentos['especies'] = $especies;
        $argumentos['mascota'] = $mascota;


        return view('mascotas.edit', $argumentos);
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
