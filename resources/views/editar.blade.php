@extends('layouts.app')


@section('titulo')
Editar Permisos

@endsection


@section('contenido')

<div class="authButtons basis-1/4 flex flex-col items-center justify-center">
    <a href="{{route('listado')}}">
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-2">
           <span class="fa-solid fa-left-long"></span> VOLVER
        </button>
    </a>
</div>


<div>
    <div class="md:flex justify-center md:gap-4 md:items-center">

        <div class="md:w-5/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('update', $listado->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="num_papeleta" class="mb-2 block uppercase text-gray-500 font-bold">
                        Numero Papeleta
                    </label>
                    <input type="text" id="num_papeleta" name="num_papeleta" placeholder="N° papeleta" class="border w-full rounded-lg p-2" value="{{$listado->num_papeleta}}">
                </div>

                <div class="mb-5">
                    <label for="dni" class="mb-2 block uppercase text-gray-500 font-bold">
                        Dni
                    </label>
                    <input type="text" id="dni" name="dni" placeholder="DNI" class="border w-full rounded-lg p-2" value="{{$listado->dni}}" required>
                </div>

                <div class="mb-5">
                    <label for="dependencia" class="mb-2 block uppercase text-gray-500 font-bold">
                        Dependencia
                    </label>
                    <input type="text" id="dependencia" name="dependencia" placeholder="Dependencia" class="border w-full rounded-lg p-2" value="{{$listado->dependencia}}" required>
                </div>

                <div class="mb-5">
                    <label for="motivo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Motivo
                    </label>
                    <label class="text-gray-500 font-bold">Particular</label>
                    <input name="motivo" type="radio" value="particular" id="motivo" class="mr-2" checked>
                    <label class="text-gray-500 font-bold">Oficial</label>
                    <input name="motivo" type="radio" value="oficial" id="motivo">
                </div>

                <div class="mb-5">
                    <label for="lugar" class="mb-2 block uppercase text-gray-500 font-bold">
                        Lugar
                    </label>
                    <input type="text" id="lugar" name="lugar" placeholder="Lugar" class="border w-full rounded-lg p-2" value="{{$listado->lugar}}" required>
                </div>

                <div class="mb-5">
                    <div class="flex items-center">
                        <label for="hora_salida" class="mb-2 mr-1 block text-gray-500 font-bold">
                            Hora de salida
                        </label>
                        <input type="time" id="hora_salida" name="hora_salida" class="border w-auto rounded-lg p-2 mr-1" value="{{$listado->hora_salida}}" required>
                        <label for="hora_llegada" class="mb-2 mr-1 block text-gray-500 font-bold">
                            Hora de llegada
                        </label>
                        <input type="time" id="hora_llegada" name="hora_llegada" class="border w-auto rounded-lg p-2 mr-1" value="{{$listado->hora_llegada}}" required>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="observacion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Observaciones (opcional)
                    </label>
                    <textarea name="observacion" id="observacion" rows="4" class="border w-full rounded-lg p-2">{{$listado->observacion}}</textarea>
                </div>

                <div class="mb-5">
                    <fieldset>
                        <legend class="mb-2 mr-1 block text-gray-500 font-bold">Fecha</legend>

                        <div class="flex items-center">
                            <label for="fecha_ini" class="mb-2 mr-1 block text-gray-500 font-bold">
                                Puno,
                            </label>
                            <input type="date" id="fecha_ini" name="fecha_ini" class="border w-auto rounded-lg p-2 mr-1" value="{{$listado->fecha_ini}}" required>
                            <label for="fecha_fin" class="mb-2 mr-1 block text-gray-500 font-bold">
                                Hasta
                            </label>
                            <input type="date" id="fecha_fin" name="fecha_fin" class="border w-auto rounded-lg p-2 mr-1" value="{{$listado->fecha_fin}}" required>
                        </div>
                    </fieldset>
                </div>

                <button type="submit" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mb-4"> <span class="fa-solid fa-pen-to-square"></span> ACTUALIZAR</button>
                
            </form>
            
        </div>
    </div>
</div>

@endsection