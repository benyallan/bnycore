@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row mt-2">
        <a href="{{route('clientes')}}">
            <x-adminlte-button label="Voltar" type="button" theme="primary" icon="fas fa-chevron-circle-left"/>
        </a>
    </div>
    <form action="{{route('clientes.salvar')}}" method="POST">
        @csrf

        <div class="row">
            <x-adminlte-input name="name" label="Cliente" placeholder="Nome do cliente" label-class="text-lightblue">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-user text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="row">
            <x-adminlte-input name="email" type="email" label="E-mail" placeholder="mail@example.com" label-class="text-lightblue">
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
            <x-adminlte-button label="Criar" type="submit" theme="success" icon="fas fa-plus-square"/>
        </div>
    </form>
</div>
@endsection
