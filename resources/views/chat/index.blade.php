@extends('adminlte::page')
@section('content_header')

<h1 class="text-lg ml-2"><i class="fas fa-th-list"></i> Chat </h1>

@stop

@section('content')
@livewire('chat.chat-component') 


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop