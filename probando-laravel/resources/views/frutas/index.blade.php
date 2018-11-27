<h1>Listado de frutas</h1>

<a href="{{ route('naranjitas') }}">Ir a naranjas</a>
<a href="{{ action('FrutasController@peras') }}">Ir a peras</a>

<ul>
@foreach ($frutas as $fruta)
    <li>{{ $fruta }}</li>
@endforeach
</ul>

<h1>Formulario en laravel</h1>
<form action="{{ url('/recibir') }}" method="POST">

    @csrf
    <p>
        <label for="nombre">Nombre de la fruta:</label>
        <input type="text" name="nombre">
    </p>

    <p>
        <label for="descripcion">Descripción de la fruta:</label>
        <textarea name="descripcion"></textarea>
    </p>
        <input type="submit" value="Enviar">
</form>
