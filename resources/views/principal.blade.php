@extends('layouts.app')


@section('titulo')
Crear Permiso
@endsection


@section('contenido')
<div>
    <div class="md:flex justify-center md:gap-4 md:items-center">

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('register')}}" method="POST">
                @csrf

                {{-- @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{session('mensaje')}}</p>
                @endif --}}

                <div class="mb-5">
                    <label for="dni" class="mb-2 block uppercase text-gray-500 font-bold">
                        DNI
                    </label>
                    <input type="text" id="dni" name="dni" placeholder="Ingrese un DNI" class="border w-full rounded-lg p-2 @error('dni') border-red-500 @enderror" value="{{old('dni')}}">

                    @error('dni')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center ">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mb-4"> <span class="fa-solid fa-magnifying-glass"></span> Buscar</button>
                
            </form>

            <a href="{{route('listado')}}">
                <button class="bg-green-600 hover:bg-green-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mb-4"><span class="fa-solid fa-file-pen"></span> Ver historial</button>
            </a>
            
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

    let mensaje = '{{session('mensaje')}}';
    if(mensaje=='1'){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La papeleta ya existe!',
        })
    }else if(mensaje=='2'){
        Swal.fire({
            icon: 'success',
            title: 'Permiso creado correctamente!',
            showConfirmButton: false,
            timer: 2000
        })
    }else if(mensaje=='3'){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No existe el usuario!',
        })
    }

</script>

@endsection