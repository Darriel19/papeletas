@extends('layouts.app')


@section('titulo')
Registro de Actividad

@endsection


@section('contenido')

<div class="authButtons basis-1/4 flex flex-row items-center justify-center gap-2">
    <a href="{{route('principal')}}">
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded mb-2">
           <span class="fa-solid fa-left-long"></span> Regresar
        </button>
    </a>

    <form action="{{route('downloadPdfactividad')}}" method="POST" target="__blank">
        @csrf
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded mb-2">
            <span class="fa-solid fa-file-pdf"></span> Reporte PDF
        </button>
    </form>

    <a href="{{route('actividadExcel')}}">
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded mb-2">
            <span class="fa-solid fa-file-excel"></span> Reporte EXCEL
        </button>
    </a>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg"> 
    <table class="w-full text-sm text-left text-gray-800 dark:text-gray-700"> <!--COLOR DE EL CONTENIDO-->
        <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-300 dark:text-gray-600"><!--COLOR DE EL ENCABEZADO-->
            <tr>
                <th scope="col" class="px-6 py-3">
                    Actividad
                </th>
                <th scope="col" class="px-6 py-3">
                    N° IP
                </th>
                <th scope="col" class="px-6 py-3">
                    Sistema Operativo
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha Actividad
                </th>
                <th scope="col" class="px-6 py-3">
                    Hora
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($listado as $item)
                <tr class="bg-white border-b dark:bg-gray-200 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                        {{$item->actividad}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->ip}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->so}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->fecha}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->hora}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">

        <div class="col-md-12">

            {{ $listado->links('pagination::tailwind') }}

        </div>
    </div>
</div>

@endsection