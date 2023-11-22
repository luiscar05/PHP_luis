<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
class CrudController extends Controller
{
    public function index (){
        return view('auth.register');
    }
    public function registrar(Request $request){


        User::create([
            "name" => $request->name,
            'cedula' => $request->cedula,
            "direccion" => $request->direccion,
            "telefono" => $request->telefono,
            "correo" => $request->email
        ]);
        return redirect()->route("listarUsers");
    }

    public function listar(){
        $datos=DB::select('select * from users');
        return view('auth.listar')->with("datos",$datos);
    }
    public function buscar($id){
        $usuario=User::find($id);
        return view('auth.actuallizar')->with("datos",$usuario);
    }
    public function actuctualizar(Request $request, $id){

        $usuario=User::find($id);
        $usuario->update([
            "name" => $request->name,
                'cedula' => $request->cedula,
                "direccion" => $request->direccion,
                "telefono" => $request->telefono,
                "correo" => $request->email
        ]);
        return redirect()->route("listarUsers");
    }
    public function Eliminar($id){
        // Busca el usuario por su id y lo elimina
        User::findOrFail($id)->delete();

        // Redirige a la vista principal
        return redirect()->route("listarUsers");
    }
    public function pdf($id){
        $usuario=User::find($id);

        $pdf = Pdf::loadView('auth.pdf', compact('usuario'));

        return $pdf->download('Usuario.pdf');
        /* return  $pdf->stream('Usuario.pdf'); */
    }
}
