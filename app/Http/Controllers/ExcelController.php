<?php

namespace App\Http\Controllers;

use App\Exports\Userexports;
use App\Exports\Actiexports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelExcel;


class ExcelController extends Controller
{
    public function papeletasExcel(){

        return Excel::download(new Userexports, 'reporte-papeleta.xlsx', ExcelExcel::XLSX);

    }

    public function actividadExcel(){

        return Excel::download(new Actiexports, 'reporte-actividad.xlsx', ExcelExcel::XLSX);

    }
}
