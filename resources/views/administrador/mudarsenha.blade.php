@extends('adminlte::page')

@section('content')
    <div class="container">
        <form action="{{route('funcionarios.atualizarSenha', $colaborador->id)}}" method="post">
            @csrf

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
    </div>
@endsection
