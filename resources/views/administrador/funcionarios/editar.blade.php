@extends('adminlte::page')

@section('content')

<div class="row mt-2">
    <a href="{{route('funcionarios')}}">
        <x-adminlte-button label="Voltar" type="button" theme="primary" icon="fas fa-chevron-circle-left"/>
    </a>
</div>
<form action="{{route('funcionarios.editar', $funcionario->id)}}" method="post">
    @csrf
    <div class="row">
        <x-adminlte-input value="{{$funcionario->name}}" name="name" label="Colaborador" placeholder="Nome do colaborador" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
    </div>
    <div class="row">
        <x-adminlte-input value="{{$funcionario->email}}" name="email" type="email" label="E-mail" placeholder="mail@example.com" label-class="text-lightblue">
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

    @php
        $config = [
            "placeholder" => "Selecione as funções do colaborador...",
            "allowClear" => true,
        ];
    @endphp
    <x-adminlte-select2 id="roles" name="roles[]" label="Funções"
        label-class="text-danger" igroup-size="sm" :config="$config" multiple>
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-red">
                <i class="fas fa-lg fa-briefcase"></i>
            </div>
        </x-slot>
        @foreach ($roles as $role)
            <option value="{{$role->id}}" {{ in_array($role->name, $funcionarioRole, true) ? 'selected' : '' }}  >{{$role->name}}</option>
        @endforeach
    </x-adminlte-select2>
        <div class="form-row m-1">
            <x-adminlte-button class="btn-flat" type="submit" label="Salvar" theme="success" icon="fas fa-lg fa-save"/>
        </div>
</form>
@endsection
