<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index()
    {
        $datos = DB::select(" select * from producto ");
        return view("welcome")->with("datos", $datos);
    }

    public function create(Request $request)
    {
        // return $request ->txtnombre;
        try {
            $sql = DB::insert(
                "insert into producto(id_producto, nombre, precio, cantidad) values(?,?,?,?)",
                [
                    $request->txtcodigo,
                    $request->txtnombre,
                    $request->txtprecio,
                    $request->txtcantidad
                ]
            );
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto", "Producto Registrado Correctamente");
        } else {
            return back()->with("incorrecto", "error al registrar");
        }
    }

    public function update(Request $request)
    {
        try {
            $sql = DB::update("update producto set nombre=?, precio=?, cantidad=? where id_producto=?", [
                $request->txtnombre,
                $request->txtprecio,
                $request->txtcantidad,
                $request->txtcodigo,
            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto", "Producto Actualizado Correctamente");
        } else {
            return back()->with("incorrecto", "error al actualizar");
        }
    }

    public function delete($id)
    {
        try {
            $sql = DB::delete(
                "delete from producto where id_producto=$id"
            );
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto", "Producto eliminado Correctamente");
        } else {
            return back()->with("incorrecto", "error al eliminado");
        }
    }
}