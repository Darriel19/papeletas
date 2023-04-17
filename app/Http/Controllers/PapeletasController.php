<?php

namespace App\Http\Controllers;

use App\Models\Papeletas;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Papeletas $papeletas)
    {
        //
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

        $listado->update($lista);

        return redirect()->route('listado')->with('mensaje','1');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $listado = Papeletas::find($id);

        $listado->delete();
        return redirect()->route('listado');
    }
}
