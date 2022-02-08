<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    //LOGIN
    public function login_ajax(Request $request){
        $email = $request->input('email_user');
        $password = $request->input('password_user');
        $search_user=DB::select('select * from tbl_usuario where mail_usuario=? and contraseña_usuario=?',[$email,$password]);
        if (sizeof($search_user)>0){
            foreach ($search_user as $user) {
                session(['user' => $user->nombre_usuario]);
                session(['tipo' => $user->perfil_usuario]);

            }
        }
        return response()->json($search_user);
    }
    //LOGOUT
    public function logout(){
        session()->forget('user');
        return response()->json("OK");
    }
    //Registrarse
    public function registro_ajax(Request $request){
        try {
            $email = $request->input('email');
            $user_mismo_mail=DB::select('select * from tbl_usuario where mail_usuario=?',[$email]);
            if (sizeof($user_mismo_mail)>0){
                return response()->json(array('mismo_mail'=>'NOK'));
            }

            if ($request->hasFile('photo')) {
                $path=$request->file('photo')->store('img/','public');                
            }else{
                $path="img/XQA0H4DjGOhvgZQAuLgnrSow4M7ho2DAngS06g6n.jpg";
            }
            
            DB::insert('insert into tbl_usuario (mail_usuario,contraseña_usuario,foto_usuario,nombre_usuario,perfil_usuario) values (?,?,?,?,?)',[$request->input('email'),$request->input('password'),$path,$request->input('name'),$request->input('type')]);
            return response()->json(array('resultado'=> 'OK'));            
        } catch (\Throwable $th) {
            return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
        }
    }
}
