@extends('layouts.default')
@section('title') {{ $name }} @stop
@section('jumbo')
    <div class="jumbotron text-center">
        <h1>{{ $name }}</h1>
        <p><a href='mailto:{{ $email }}'>Email</a></p>
    </div>
@stop

@section('content')

@stop