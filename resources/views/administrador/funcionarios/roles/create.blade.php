@extends('adminlte::page')

@section('content')
<div class="container">
    <form action="">
        {{-- Com rótulo, feedback inválido desativado e classe de grupo de formulário --}}
        <div class="row">
            <x-adminlte-input name="iLabel" label="Nome" placeholder="Nome da função"
                fgroup-class="col-md-6" disable-feedback/>
        </div>
        {{-- Com vários slots e várias opções --}}
        <x-adminlte-select id="selUser" name="selUser[]" label="Permissões" label-class="text-danger" multiple>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-red">
                    <i class="fas fa-lg fa-user-shield"></i>
                </div>
            </x-slot>
            <x-slot name="appendSlot">
                <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"/>
            </x-slot>
            <option>Listar funções</option>
            <option>Criar funções</option>
            <option>Apagar funções</option>
            <option>Editar funções</option>
        </x-adminlte-select>

        {{-- With multiple slots, and plugin config parameter --}}
        @php
            $config = [
                "placeholder" => "Select multiple options...",
                "allowClear" => true,
            ];
        @endphp
        <x-adminlte-select2 id="sel2Category" name="sel2Category[]" label="Categories"
        label-class="text-danger" igroup-size="sm" :config="$config" multiple>
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-red">
                <i class="fas fa-tag"></i>
            </div>
        </x-slot>
        <x-slot name="appendSlot">
            <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"/>
        </x-slot>
        <option>Sports</option>
        <option>News</option>
        <option>Games</option>
        <option>Science</option>
        <option>Maths</option>
        </x-adminlte-select2>
    </form>
</div>
@endsection
