@extends('adminlte::page')

@section('content')
<div class="container">
    <form action="{{route('roles.store')}}" method="POST">
        @csrf
        {{-- Com rótulo, feedback inválido desativado e classe de grupo de formulário --}}
        <div class="row">
            <x-adminlte-input id="name" name="name" label="Nome" placeholder="Nome da função"
                fgroup-class="col-md-6" disable-feedback/>
        </div>

        @php
            $config = [
                "placeholder" => "Selecione as permissões...",
                "allowClear" => true,
                'closeOnSelect' => false,
            ];
        @endphp
        <x-adminlte-select2 id="permission" name="permission[]" label="Permissões"
        label-class="text-danger" igroup-size="sm" :config="$config" multiple>
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-red">
                <i class="fas fa-tag"></i>
            </div>
        </x-slot>
        @foreach ($permission as $key)
            <option>{{$key->name}}</option>
        @endforeach
        </x-adminlte-select2>
        <x-adminlte-button label="Criar" type="submit" theme="success" icon="fas fa-plus-square"/>
    </form>
</div>
@endsection
