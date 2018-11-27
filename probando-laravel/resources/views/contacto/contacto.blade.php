<h1>Página de contacto {!! $nombre !!} {{-- isset($edad) && !is_null($edad) ? $edad : 'No existe la edad' --}}</h1>

@include('contacto.cabecera')

{{-- Condiciones --}}
@if (is_null($edad))
    No existe la edad
@else
    Si existe la edad: {{ $edad }}
@endif

@include('contacto.cabecera')

{{-- bucle for --}}
<p>
    <?php $numero =4; ?>
    Tabla del {{ $numero }}
</p>
@for($i = 1; $i <= 10; $i++)
    {{ $i.' x '.$numero.' = '.($i * $numero) }} <br>
@endfor

@include('contacto.cabecera')

{{-- bucle foreach --}}
<h2>Listado de frutas</h2>
@foreach ($frutas as $fruta)
    <p>{{ $fruta }}</p>
@endforeach
