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
            $telefono = $request->input('telefono');
            $dieta = $request->input('dieta');
            $comidas = $request->input('comidas');
            $descripcion = $request->input('descripcion');
            $descripcion_larga = $request->input('descripcion_larga');
            $activo = $request->input('activo');
            $precio = $request->input('precio');

            //Textos completos


            DB::update('update tbl_restaurantes set nombre_restaurante = ?,loc_lat_restaurante=?,descripcion_restaurante=?,desc_larga=?,email_dueño=?,telefono=?,loc_alt_restaurante=?,loc_restaurante=?,tipo_restaurante=?,dieta_especial=?,comidas_restaurante=?,activo_restaurante=?,precio_restaurante=? where id_restaurante = ?',
            [$nombre,$latitud,$descripcion,$descripcion_larga,$email,$telefono,$altitud,$localidad,$tipo,$dieta,$comidas,$activo,$precio,$id]);

            return response()->json(array('resultado'=> 'OK'));   

        } catch (\Throwable $th) {
            return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
        }
    }
    public function crear(Request $request){
        try {
            //Request a la comunicacion con AJax
            
            //FOTO
            if ($request->hasFile('foto')) {
                $path1=$request->file('foto')->store('/img','public');                
            }else{
                $path1="img/XQA0H4DjGOhvgZQAuLgnrSow4M7ho2DAngS06g6n.jpg";
            }
            for ($i=2; $i <= 6; $i++) { 
                if ($request->hasFile('foto'.$i)) {
                    $path[$i]=$request->file('foto'.$i)->store('/img','public');
                }else{
                    $path[$i]="img/XQA0H4DjGOhvgZQAuLgnrSow4M7ho2DAngS06g6n.jpg";
                }
            }

            //INPUTS
            $nombre = $request->input('nombre');
            $latitud = $request->input('latitud');
            $altitud = $request->input('altitud');
            $localidad = $request->input('localidad');
            $tipo = $request->input('tipo');
            $email = $request->input('email');
            $telefono = $request->input('telefono');
            $dieta = $request->input('dieta');
            $comidas = $request->input('comidas');
            $descripcion = $request->input('descripcion');
            $descripcion_larga = $request->input('descripcion_larga');
            $activo = $request->input('activo');
            $precio = $request->input('precio');

            //Textos completos
            $id = DB::table('tbl_restaurantes')->insertGetId(
                [ 'nombre_restaurante' => $nombre,'email_dueño'=> $email,'loc_alt_restaurante'=>$altitud,'loc_lat_restaurante'=>$latitud,'descripcion_restaurante'=>$descripcion,'desc_larga'=>$descripcion_larga,'telefono'=>$telefono,'loc_restaurante'=>$localidad,'tipo_restaurante'=>$tipo,'dieta_especial'=>$dieta,'comidas_restaurante'=>$comidas,'activo_restaurante'=>$activo,'precio_restaurante'=>$precio ]);
            DB::insert('insert into tbl_fotos (url_foto_principal,id_restaurante,url_foto1,url_foto2,url_foto3,url_foto4) values (?,?,?,?,?,?)',[$path1,$id,$path[2],$path[3],$path[4],$path[5]]);
            return response()->json(array('resultado'=> 'OK'));   

        } catch (\Throwable $th) {
            return response()->json(array('resultado'=> 'NOK: '.$th->getMessage()));
        }
    }
    public function desactivar_activar(Request $request){
        $id = $request->input('id');

        $select_rest=DB::select('select activo_restaurante from tbl_restaurantes where id_restaurante=?',[$id]);
        if ($select_rest[0]->activo_restaurante==1) {
            DB::update('update tbl_restaurantes set activo_restaurante=? where id_restaurante = ?',[0,$id]);
            return response()->json($select_rest[0]);
        }elseif($select_rest[0]->activo_restaurante==0){
            DB::update('update tbl_restaurantes set activo_restaurante=? where id_restaurante = ?',[1,$id]);
            return response()->json($select_rest[0]);
        }
        
    }
}
