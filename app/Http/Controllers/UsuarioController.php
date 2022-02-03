<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos=DB::select('select * from tbl_usuario');
        return response()->json($datos);
    }
    public function login(){
        //Esto es solo un redirect al formulario
        //return view('login', ['listapersonas' => $listapersonas]);
        return view('login');
    }
    public function login_ajax(Request $request){
        $email = $request->input('email_user');
        $password = $request->input('password_user');
        $login_succes=0;
        $search_user=DB::select('select * from tbl_usuario where mail_usuario=? and contraseña_usuario=?',[$email,$password]);
        if (sizeof($search_user)>0){
            foreach ($search_user as $user) {
                //AQUI ESTA LA CHICA
               //session(['user' => $user['nombre_usuario']]);
               session(['user' => $user['nombre_usuario']]);


            }
            $login_succes=1;
            return $login_succes;
        }else{
            $login_succes=0;
            return $login_succes;
        }
    }
    public function registro_ajax(Request $request){
        try {
            
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
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
