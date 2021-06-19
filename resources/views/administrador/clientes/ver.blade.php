@extends('adminlte::page')

@section('content')
<h1>{{$cliente->name}}</h1>
<div class="row mt-2">
    <a href="{{route('clientes')}}">
        <x-adminlte-button label="Voltar" type="button" theme="primary" icon="fas fa-chevron-circle-left"/>
    </a>
</div>
<p>Cliente: {{$cliente->email}}</p>
@endsection
