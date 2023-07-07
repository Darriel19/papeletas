<?php

namespace App\Http\Controllers;

use App\Models\Papeletas;
use Illuminate\Http\Request;

use UAParser\Parser;
use Illuminate\Support\Facades\DB;

//obtner la zona horaria
date_default_timezone_set('America/Lima'); 

class PapeletasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listado = Papeletas::latest()->paginate(5);

        return view('listado', compact('listado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $listado = Papeletas::find($id);

        return view('editar', compact('listado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $listado = Papeletas::find($id);

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

        $lista = $request->all();
        ////////////////////
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
            'actividad' => 'ACTUALIZADO',
            'ip' => $ipUsuario,
            'fecha'=> date('Y-m-d'),
            'hora' => date('H:i'),
            'so' => $so
        ]);
        //////////////////////////////
        $listado->update($lista);

        return redirect()->route('listado')->with('mensaje','1');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id , Request $request)
    {
        $listado = Papeletas::find($id);
        ////////////////////
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
            'actividad' => 'ELIMINADO',
            'ip' => $ipUsuario,
            'fecha'=> date('Y-m-d'),
            'hora' => date('H:i'),
            'so' => $so
        ]);
        //////////////////////////////
        $listado->delete();
        return redirect()->route('listado');
    }
}
