<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;
use App\Models\Papeletas;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.registrar');
    }

    public function show(Request $request)
    {
        $this->validate($request,[
            'dni' => 'required|min:8'
        ]);

        $dni = $request->get('dni');

        $consulta = Usuarios::select('nombre','apepater','apemater','cargo','tarjeta', 'oficina')->where('le', '=', $dni )->get()->toArray();
        
        if($consulta){
            return view('auth.registrar', compact('consulta'));
        }else{
            return redirect()->route('principal')->with('mensaje','3');
        }
    }

    public function store(Request $request)
    {
        //var_dump($_POST);
        //exit;

        $request->validate([
            "num_papeleta" => 'required|numeric',
            "dni" => 'required|numeric',
            "dependencia" => 'required',
            "motivo" => 'required',
            "lugar" => 'required',
            "hora_salida" => 'required',
            "hora_llegada" => 'required',
            "observacion" => 'required',
            "fecha_ini" => 'required',
            "fecha_fin" => 'required'
        ]);
        $listado = $request->all();

        $consulta = Papeletas::select('*')->get()->toArray();
        $valor = false;

        for($i = 0; $i < count($consulta);$i++){
            if($consulta[$i]['num_papeleta'] === $listado['num_papeleta']){
                $valor = true;
            }
        }

        if($valor == true){
            return redirect()->route('principal')->with('mensaje','1');
        }else{
            Papeletas::create($listado);
    
            return redirect()->route('principal')->with('mensaje','2');
        }
    }



}
