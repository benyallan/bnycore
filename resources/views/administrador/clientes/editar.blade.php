@extends('adminlte::page')

@section('content')

<div class="row mt-2">
    <a href="{{route('clientes')}}">
        <x-adminlte-button label="Voltar" type="button" theme="primary" icon="fas fa-chevron-circle-left"/>
    </a>
</div>
<form action="{{route('clientes.editar', $cliente->id)}}" method="post">
    @csrf
    <div class="row">
        <x-adminlte-input value="{{$cliente->name}}" name="name" label="Cliente" placeholder="Nome do cliente" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
    </div>
    <div class="row">
        <x-adminlte-input value="{{$cliente->email}}" name="email" type="email" label="E-mail" placeholder="mail@example.com" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="far fa-envelope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
    </div>
    <div class="row">
        <x-adminlte-input name="password" type="password" label="Senha" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-unlock-alt text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input id="confirm-password" name="confirm-password" type="password" label="Confirmar senha" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-unlock-alt text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
    </div>
    <div class="form-row m-1">
        <x-adminlte-button class="btn-flat" type="submit" label="Salvar" theme="success" icon="fas fa-lg fa-save"/>
    </div>
</form>
@endsection
