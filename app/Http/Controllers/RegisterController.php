<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;
use App\Models\Papeletas;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use UAParser\Parser;
use Illuminate\Support\Facades\DB;

//obtner la zona horaria
date_default_timezone_set('America/Lima');

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

        $consulta = Usuarios::select('id','nombre','apepater','apemater','cargo','tarjeta', 'oficina','le')->where('le', '=', $dni )->get()->toArray();
        
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
            "fecha_fin" => 'required',
            "usuario_id" => 'required|exists:usuarios,id',
        ]);
        //metodo 1
        $listado = $request->all();

        //metodo 2
        /*
        $listado = new Papeletas;
        $listado->usuario_id = $request->usuario_id;
        $listado->num_papeleta = $request->num_papeleta;
        $listado->dni = $request->dni;
        $listado->dependencia = $request->dependencia;
        $listado->motivo = $request->motivo;
        $listado->lugar = $request->lugar;
        $listado->hora_salida = $request->hora_salida;
        $listado->hora_llegada = $request->hora_llegada;
        $listado->observacion = $request->observacion;
        $listado->fecha_ini = $request->fecha_ini;
        $listado->fecha_fin = $request->fecha_fin;
        */

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
            //obtener la ip del usuario
            $ipUsuario = request()->ip();
            // Obtener el User-Agent del usuario
            $userAgent = $request->header('User-Agent');

            // Crear un analizador de User-Agent
            $parser = Parser::create();

            // Analizar el User-Agent
            $result = $parser->parse($userAgent);

            // Obtener el sistema operativo
            $operatingSystem = $result->os->toString();
            
            //si se crea un usuario se almacena el SO

            $so = $operatingSystem;
            DB::table('actividades')->insert([
                'actividad' => 'CREADO',
                'ip' => $ipUsuario,
                'fecha'=> date('Y-m-d'),
                'hora' => date('H:i'),
                'so' => $so
            ]);

            //guardar metodo 1
            Papeletas::create($listado);

            //guardar metodo 2
            //$listado->save();
    
            return redirect()->route('principal')->with('mensaje','2');
        }
    }
}
