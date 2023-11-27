<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class PruebaController extends Controller
{
    
public function indeX(){
    $datos=DB::select('select * from datos');
    return view("welcome")->with('datos', $datos);
}

//Añadir
public function create(Request $request){
    try {
        $sql=DB::insert('insert into datos(id,descripcion,fecha)values(?,?,?)',[
            $request->txtid,
            $request->txtdescripcion,
            $request->txtfecha
        ]);
    } catch (\Throwable $th) {
        $sql = 0;
    }
    if ($sql == true) {
        return back()->with('Correcto','Añadido correctamente');
    } else {
        return back()->with('Inorrecto','Error al añadir');
    }
}

//Modificar
public function update(Request $request){
    try {
        $sql=DB::insert('update datos set descripcion=?,fecha=? where id=?',[
            $request->txtdescripcion,
            $request->txtfecha,
            $request->txtid
        ]);

    //    if ($sql == 0) {
    //        $sql = 1;
    //    }

    } catch (\Throwable $th) {
        $sql = 0;
    }
    if ($sql == true) {
        return back()->with('Correcto','Modificacion exitosa');
    } else {
        return back()->with('Inorrecto','Error al modificar');
    }
}

//Eliminar
public function delete($id){
    try {
        $sql=DB::delete(" delete from datos where id=$id");
    } catch (\Throwable $th) {
        $sql = 0;
    }
    if ($sql == true) {
        return back()->with('Correcto','Eliminado correctamente');
    } else {
        return back()->with('Inorrecto','Error al eliminar');
    }
}

}
