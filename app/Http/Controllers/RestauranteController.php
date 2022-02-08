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
    public function mostrarControler($id){
        $restaurante=DB::table('tbl_restaurantes')->join('tbl_fotos','tbl_restaurantes.id_restaurante','=','tbl_fotos.id_restaurante')->select()->where('tbl_restaurantes.id_restaurante','=',$id)->first();
        return view('restaurante', compact('restaurante'));
    }
    public function leerControler(Request $request){
        if($request->input('tipo')==1){
            $datos=DB::select('select * from tbl_restaurantes inner join tbl_fotos on tbl_restaurantes.id_restaurante=tbl_fotos.id_foto where nombre_restaurante like ?',['%'.$request->input('filtro').'%']);
        }else if($request->input('tipo')==2){
            $filtro=$request->input('filtro');
            $tipo=$request->input('comida');
            $datos=DB::select('select * from tbl_restaurantes inner join tbl_fotos on tbl_restaurantes.id_restaurante=tbl_fotos.id_foto where nombre_restaurante like ? and tipo_restaurante like ?',['%'.$filtro.'%','%'.$tipo.'%']);
        }else{
            $datos=DB::select('select * from tbl_restaurantes where id_restaurante = ?',[$request->input('filtro')]);
        }

        return response()->json($datos);
    }
    public function login_ajax(Request $request){
        $email = $request->input('email_user');
        $password = $request->input('password_user');
        $search_user=DB::select('select * from tbl_usuario where mail_usuario=? and contraseña_usuario=?',[$email,$password]);
        if (sizeof($search_user)>0){
            foreach ($search_user as $user) {
                session(['user' => $user->nombre_usuario]);
            }
        }
        return response()->json($search_user);
    }
    public function registro_ajax(Request $request){
        try {
            $email = $request->input('email');
            $user_mismo_mail=DB::select('select * from tbl_usuario where mail_usuario=?',[$email]);
            if (sizeof($user_mismo_mail)>0){
                return response()->json(array('mismo_mail'=>'NOK'));
            }

            if ($request->hasFile('photo')) {
                $path=$request->file('photo')->store('uploads','public');                
            }else{
                $path="uploads/XQA0H4DjGOhvgZQAuLgnrSow4M7ho2DAngS06g6n.jpg";
            }
            
            DB::insert('insert into tbl_usuario (mail_usuario,contraseña_usuario,foto_usuario,nombre_usuario,perfil_usuario) values (?,?,?,?,?)',[$request->input('email'),$request->input('password'),$path,$request->input('name'),$request->input('type')]);
            return response()->json(array('resultado'=> 'OK'));            
        } catch (\Throwable $th) {
            return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
        }
    }
    public function logout(){
        session()->forget('user');
        return view('login');
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
