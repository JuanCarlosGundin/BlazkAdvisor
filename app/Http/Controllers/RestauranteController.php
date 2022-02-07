<?php

namespace App\Http\Controllers;

use App\Models\restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestauranteController extends Controller
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

    public function mostrarRestaurantes(Request $request){
        $listarestaurantes=DB::select('select * from tbl_restaurantes');
        return view('/', compact('listarestaurantes'));
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
     * @param  \App\Models\restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function show(restaurante $restaurante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(restaurante $restaurante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, restaurante $restaurante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(restaurante $restaurante)
    {
        //
    }
}
