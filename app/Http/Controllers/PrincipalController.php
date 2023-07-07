<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use App\Models\Papeletas;
use App\Models\Usuarios;
use Illuminate\Http\Request;


use PDF;

class PrincipalController extends Controller
{
    public function index(){
    
        return view('principal');
    }

    public function viewPdf($id){

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        //$data = ['title' => 'Testing Page Number In Body'];
        //$pdf->loadView('detallesventa', $data);
        $usuarios = Papeletas::find($id);
        $data = ['success'=>true,'usuarios'=>$usuarios];
        $datos = $data['usuarios'];
        $decode = json_decode($datos);
        $dni = $decode->dni;

        $usuarios2 = Usuarios::select('nombre','apepater','apemater','cargo','tarjeta', 'oficina')->where('le', '=', $dni)->get()->toArray();

        //$usuarios2 = Usuarios::find($id);
        $data2 = ['success'=>true,'usuarios'=>$usuarios2];
        $datos2 = $data2['usuarios'];
        //$decode2 = json_decode($datos2);

        $pdf = PDF::loadView('pdf.papeleta', compact('decode','datos2'))
        ->setPaper('A5','landscape'); //landscape = horizontal

        return $pdf->stream();
    }

    public function downloadPdfhistorial(){
        $permisos = Papeletas::all();
        $data = ['success'=>true,'permisos'=>$permisos];
        $datos = $data['permisos'];
        $decode = json_decode($datos);

        $pdf = PDF::loadView('pdf.historial', compact('decode'))
        ->setPaper('A4','portrait'); //landscape = horizontal

        return $pdf->download('historial-permisos.pdf');
    }

    public function downloadPdfactividad(){
        $actividades = Actividades::all();
        $data = ['success'=>true,'actividades'=>$actividades];
        $datos = $data['actividades'];
        $decode = json_decode($datos);

        $pdf = PDF::loadView('pdf.actividad', compact('decode'))
        ->setPaper('A4','portrait'); //landscape = horizontal

        return $pdf->download('historial-actividad.pdf');
    }
}
