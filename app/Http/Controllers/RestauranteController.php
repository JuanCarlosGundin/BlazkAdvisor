<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        
        try {
            //Request a la comunicacion con AJax

            $id = $request->input('id');
            $nombre = $request->input('nombre');
            $latitud = $request->input('latitud');
            $altitud = $request->input('altitud');
            $localidad = $request->input('localidad');
            $tipo = $request->input('tipo');
            $email = $request->input('email');
            $dieta = $request->input('dieta');
            $comidas = $request->input('comidas');
            $descripcion = $request->input('descripcion');
            $activo = $request->input('activo');
            $precio = $request->input('precio');

            //Textos completos


            DB::update('update tbl_restaurantes set nombre_restaurante = ?,loc_lat_restaurante=?,descripcion_restaurante=?,email_dueño=?,loc_alt_restaurante=?,loc_restaurante=?,tipo_restaurante=?,dieta_especial=?,comidas_restaurante=?,activo_restaurante=?,precio_restaurante=? where id_restaurante = ?',
            [$nombre,$latitud,$descripcion,$email,$altitud,$localidad,$tipo,$dieta,$comidas,$activo,$precio,$id]);

            return response()->json(array('resultado'=> 'OK'));   

        } catch (\Throwable $th) {
            return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
        }
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
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurante $restaurante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurante $restaurante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurante $restaurante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurante $restaurante)
    {
        //
    }
}
