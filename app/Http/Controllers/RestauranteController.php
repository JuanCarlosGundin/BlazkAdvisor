<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function leerControler(Request $request){
        if($request->input('tipo')==1){
            $datos=DB::select('select * from tbl_restaurantes inner join tbl_fotos on tbl_restaurantes.id_restaurante=tbl_fotos.id_foto where tipo_restaurante like ?',['%'.$request->input('filtro').'%']);
        }else{
            $datos=DB::select('select * from tbl_restaurantes inner join tbl_fotos on tbl_restaurantes.id_restaurante=tbl_fotos.id_foto where nombre_restaurante like ?',['%'.$request->input('filtro').'%']);
        }

        return response()->json($datos);
    }
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
