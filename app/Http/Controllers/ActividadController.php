<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index(){

        $listado = Actividades::latest()->orderBy('hora','desc')->paginate(5);

        return view('actividad', compact('listado'));
    }
}
