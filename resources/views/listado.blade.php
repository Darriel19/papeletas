@extends('layouts.app')


@section('titulo')
Historial de Permisos

@endsection


@section('contenido')

<div class="authButtons basis-1/4 flex flex-row items-center justify-center gap-2">
    <a href="{{route('principal')}}">
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded mb-2">
           <span class="fa-solid fa-left-long"></span> Regresar
        </button>
    </a>

    <form action="{{route('downloadPdfhistorial')}}" method="POST" target="__blank">
        @csrf
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded mb-2">
            <span class="fa-solid fa-file-pdf"></span> Reporte PDF
        </button>
    </form>

    <a href="{{route('papeletasExcel')}}">
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
                    Numero de papeleta
                </th>
                <th scope="col" class="px-6 py-3">
                    Dni
                </th>
                <th scope="col" class="px-6 py-3">
                    Dependencia
                </th>
                <th scope="col" class="px-6 py-3">
                    Motivo
                </th>
                <th scope="col" class="px-6 py-3">
                    Lugar
                </th>
                <th scope="col" class="px-6 py-3">
                    Hora salida
                </th>
                <th scope="col" class="px-6 py-3">
                    Hora llegada
                </th>
                <th scope="col" class="px-6 py-3">
                    Observacion
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha ini
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha fin
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($listado as $item)
            <tr class="bg-white border-b dark:bg-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                    {{$item->num_papeleta}}
                </th>
                <td class="px-6 py-4">
                    {{$item->dni}}
                </td>
                <td class="px-6 py-4">
                    {{$item->dependencia}}
                </td>
                <td class="px-6 py-4">
                    {{$item->motivo}}
                </td>
                <td class="px-6 py-4">
                    {{$item->lugar}}
                </td>
                <td class="px-6 py-4">
                    {{$item->hora_salida}}
                </td>
                <td class="px-6 py-4">
                    {{$item->hora_llegada}}
                </td>
                <td class="px-6 py-4">
                    {{$item->observacion}}
                </td>
                <td class="px-6 py-4">
                    {{$item->fecha_ini}}
                </td>
                <td class="px-6 py-4">
                    {{$item->fecha_fin}}
                </td>
                <td class="px-6 py-4">
                    <div class="authButtons basis-1/4 flex flex-row items-center justify-center gap-1">

                        <a href="{{route('editar',$item->id)}}">
                            <button class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-1 px-2 rounded" >
                                <span class="fa-solid fa-marker"></span>
                            </button>
                        </a>
    
                        <form action="{{route('destroy',$item->id )}}" method="POST" class="elim">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                <span class="fa-solid fa-trash-can"></span>
                            </button>
                        </form>

                        <form action="{{route('viewPdf',$item->id)}}" method="POST" target="__blank">
                            @csrf
                            <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-1 px-2 rounded" >
                                <span class="fa-solid fa-print"></span>
                            </button>
                        </form>
                        
                    </div>
                    
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

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
(function() {
    var forms = document.querySelectorAll('.elim');
    Array.prototype.slice.call(forms)
    .forEach(function(form){
        form.addEventListener('submit',function(event){
            event.preventDefault()
            event.stopPropagation()
            Swal.fire({
                title:'¿Esta seguro de eliminar?',
                icon:'info',
                showCancelButton:true,
                confirmButtonColor: '#20c997',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if(result.isConfirmed){
                    this.submit();
                    Swal.fire({
                        icon: 'success',
                        title: 'Eliminado correctamente!',
                        showConfirmButton: false,
                        timer: 1500
                    })
    
                }
            })
        },false)
    })
})();


let mensaje = '{{session('mensaje')}}';

if(mensaje=='1'){
    Swal.fire({
        icon: 'success',
        title: 'Actualizado correctamente!',
        showConfirmButton: false,
        timer: 2000
    })
}
</script>
@endsection