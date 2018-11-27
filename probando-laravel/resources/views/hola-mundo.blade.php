@extends('layouts.master')

@csrf

@section('title', 'Curso Laravel')

@section('header')
    @parent
    <h1>Cabecera desde hola mundo</h1>
@stop

@section('content')
    <p>Contenido de la vista Hola Mundo</p>
@stop
