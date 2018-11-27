<h1>
    @if(!isset($note))
        Crear una nota
    @else
        Actualizar nota
    @endif
</h1>

<form action="{{ !isset($note) ? url('/notas/note') : url('/notas/update-note/'.$note->id) }}" method="POST">
    @csrf
<input type="text" name="title" placeholder="Titulo de la nota" value="{{ isset($note) ? $note->title : ''}}"><br>
    <textarea name="desription" placeholder="Descripción de la nota">{{ isset($note) ? $note->desription : ''}}</textarea>
    <input type="submit" value="Guardar">
</form>

<a href="{{ url('/notas') }}">Volver al listado</a>
