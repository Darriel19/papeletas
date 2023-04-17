@extends('layouts.app')

@section('titulo')
Registrar permiso
@endsection

@section('contenido')
    <?php //var_dump($consulta)?>
    <?php //echo $consulta[0]['nombre']?>
    
    <div class="authButtons basis-1/4 flex flex-col items-center justify-center">
        <a href="{{route('principal')}}">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-2">
               <span class="fa-solid fa-left-long"></span> VOLVER
            </button>
        </a>
    </div>

    <form action="{{route('store')}}" method="POST">
    @csrf

        <div class="md:flex justify-center md:gap-4 md:items-center">

            <div class="md:w-6/12 bg-white p-6 rounded-lg shadow-xl"><!--Fraccion1-->
                <header class="p-5 border-b bg-gray-300 shadow">
                    <div class="container mx-auto flex justify-start items-center">
                        <img src="{{asset('img/logo.png')}}" alt="logo-drep" width="150rem">
                        <div>
                            <label for="num_papeleta" class="mb-2 block uppercase text-gray-700 font-bold">
                                N° Papeleta
                            </label>
                            <input type="text" id="num_papeleta" name="num_papeleta" placeholder="N° Papeleta" class="border w-full rounded-lg p-1" required onkeyup='addpapeleta();'>
                        </div>

                    </div>
                </header>

                <div class="mb-5">
                    <label for="dni" class="mb-2 block uppercase text-gray-500 font-bold">
                        N° Tarjeta
                    </label>
                    <input type="text" id="dni" name="dni" placeholder="N° Tarjeta" class="border w-full rounded-lg p-2" value="{{$consulta[0]['tarjeta']}}" required>

                </div>
                
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input type="text" id="name" name="name" placeholder="Nombre" class="border w-full rounded-lg p-2" value="{{$consulta[0]['nombre'] .' '.$consulta[0]['apepater'].' '.$consulta[0]['apemater']}}" required>
                </div>

                <div class="mb-5">
                    <label for="cargo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Cargo
                    </label>
                    <input type="text" id="cargo" name="cargo" placeholder="Cargo" class="border w-full rounded-lg p-2" value="{{$consulta[0]['cargo']}}" required>
                </div>

                <div class="mb-5">
                    <label for="dependencia" class="mb-2 block uppercase text-gray-500 font-bold">
                        Dependencia
                    </label>
                    <input type="text" id="dependencia" name="dependencia" placeholder="Dependencia" class="border w-full rounded-lg p-2" value="{{$consulta[0]['oficina']}}" required>
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
                        Lugar de visita
                    </label>
                    <input type="text" id="lugar" name="lugar" placeholder="Lugar" class="border w-full rounded-lg p-2" required onkeyup='addlugar();'>
                </div>

                <div class="mb-5">
                    <div class="flex items-center">
                        <label for="hora_salida" class="mb-2 mr-1 block text-gray-500 font-bold">
                            Hora de salida
                        </label>
                        <input type="time" id="hora_salida" name="hora_salida" class="border w-auto rounded-lg p-2 mr-1" required>
                        <label for="hora_llegada" class="mb-2 mr-1 block text-gray-500 font-bold">
                            Hora de llegada
                        </label>
                        <input type="time" id="hora_llegada" name="hora_llegada" class="border w-auto rounded-lg p-2 mr-1" required>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="observacion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Observaciones (opcional)
                    </label>
                    <textarea name="observacion" id="observacion" rows="4" class="border w-full rounded-lg p-2" onkeyup='addobservacion();'></textarea>
                </div>

                <div class="mb-5">
                    <fieldset>
                        <legend class="mb-2 mr-1 block text-gray-500 font-bold">Fecha</legend>

                        <div class="flex items-center">
                            <label for="fecha_ini" class="mb-2 mr-1 block text-gray-500 font-bold">
                                Puno,
                            </label>
                            <input type="date" id="fecha_ini" name="fecha_ini" class="border w-auto rounded-lg p-2 mr-1" required>
                            <label for="fecha_fin" class="mb-2 mr-1 block text-gray-500 font-bold">
                                Hasta
                            </label>
                            <input type="date" id="fecha_fin" name="fecha_fin" class="border w-auto rounded-lg p-2 mr-1" required>
                        </div>
                    </fieldset>
                </div>

                <div class="mb-5">
                    <div class="flex items-center justify-center" style="margin-top: 10rem;">
                        <p class="mb-2 mr-20 block text-gray-500 font-bold">Interesado</p>
                        <p class="mb-2 mr-20 block text-gray-500 font-bold">Jefe Inmediato</p>
                        <p class="mb-2 mr-20 block text-gray-500 font-bold">V°B° ORRHH</p>
                    </div>
                </div>
                
            </div><!--Fin Fraccion1-->

            <div class="md:w-5/12 bg-white p-6 rounded-lg shadow-xl"><!--Fraccion2-->

                <header class="p-5 border-b bg-gray-300 shadow">
                    <div class="container mx-auto flex justify-start items-center">
                        <img src="{{asset('img/logo.png')}}" alt="logo-drep" width="150rem">
                        <div>
                            <label for="" class="mb-2 block uppercase text-gray-700 font-bold">
                                N° Papeleta
                            </label>
                            <input type="text" placeholder="N° Papeleta" class="border w-full rounded-lg p-1 num_papeleta">
                        </div>
                    </div>
                </header>
                
                <div class="mb-5">
                    <label for="" class="mb-2 block uppercase text-gray-500 font-bold">
                        N° Tarjeta
                    </label>
                    <input type="text" placeholder="N° Tarjeta" class="border w-full rounded-lg p-2" value="{{$consulta[0]['tarjeta']}}">
                </div>

                <div class="mb-5">
                    <label for="" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input type="text" placeholder="Nombre" class="border w-full rounded-lg p-2" value="{{$consulta[0]['nombre']}}">
                </div>

                <div class="mb-5">
                    <label for="" class="mb-2 block uppercase text-gray-500 font-bold">
                        Cargo
                    </label>
                    <input type="text" placeholder="Cargo" class="border w-full rounded-lg p-2" value="{{$consulta[0]['cargo']}}">
                </div>

                <div class="mb-5">
                    <label for="" class="mb-2 block uppercase text-gray-500 font-bold">
                        Dependencia
                    </label>
                    <input type="text" placeholder="Dependencia" class="border w-full rounded-lg p-2" value="{{$consulta[0]['oficina']}}">
                </div>

                <div class="mb-5">
                    <label for="observaciones" class="mb-2 block uppercase text-gray-500 font-bold">
                        Observaciones
                    </label>
                    <textarea rows="4" class="border w-full rounded-lg p-2 observacion"></textarea>
                </div>

                <div class="mb-5">
                    <label for="" class="mb-2 block uppercase text-gray-500 font-bold">
                        Lugar de visita
                    </label>
                    <input type="text" placeholder="Lugar de visita" class="border w-full rounded-lg p-2 lugar">
                </div>

                <div class="mb-5">
                    <div class="flex items-center justify-center" style="margin-top: 10rem;">
                        <p class="mb-2 mr-8 block text-gray-500 font-bold">Firma Sello (lugar-1)</p>
                        <p class="mb-2 mr-8 block text-gray-500 font-bold">Firma Sello (lugar-2)</p>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="flex items-center justify-center" style="margin-top: 9rem;">
                        <p class="mb-2 mr-8 block text-gray-500 font-bold">Firma Sello (lugar-3)</p>
                        <p class="mb-2 mr-8 block text-gray-500 font-bold">Firma Sello (lugar-4)</p>
                    </div>
                </div>
                <button type="submit" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"><span class="fa-solid fa-plus"></span> Registrar</button>
                
            </div><!--Fin Fraccion2-->
        </div>
    </form>

@endsection


@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        function addpapeleta()
            {
            var elements = document.querySelectorAll(".num_papeleta");
            var valor = document.getElementById('num_papeleta').value;

            for(var i = 0; i < elements.length;i++)
            {
                elements[i].value = valor;
            }
        }

        function addlugar()
            {
            var elements = document.querySelectorAll(".lugar");
            var valor = document.getElementById('lugar').value;

            for(var i = 0; i < elements.length;i++)
            {
                elements[i].value = valor;
            }
        }

        function addobservacion()
            {
            var elements = document.querySelectorAll(".observacion");
            var valor = document.getElementById('observacion').value;

            for(var i = 0; i < elements.length;i++)
            {
                elements[i].value = valor;
            }
        }

        //deshabilitar fechas anteriores
        $(function(){
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();

            var minDate= year + '-' + month + '-' + day;

            $('#fecha_ini').attr('min', minDate);
            $('#fecha_fin').attr('min', minDate);
        });
    </script>
@endsection
