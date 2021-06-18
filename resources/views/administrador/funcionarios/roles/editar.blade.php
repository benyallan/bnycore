@extends('adminlte::page')

@section('content')

<div class="row mt-2">
    <a href="{{route('roles.index')}}">
        <x-adminlte-button label="Voltar" type="button" theme="primary" icon="fas fa-chevron-circle-left"/>
    </a>
</div>
<form action="{{route('roles.alterar', $role->id)}}" method="post">
    @csrf
    <x-adminlte-input name="name" label="Função" value="{{$role->name}}" label-class="text-lightblue" placeholder="Digite o nome da função...">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-briefcase text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <select name="permission[]" data-actions-box="true" class="selectpicker" data-width="100%" multiple title="Escolha as permissões..." data-style="btn-info">
        <optgroup label="Funções">
          @foreach ($permission as $key)
                @if (Str::contains($key->name, 'funções') && !Str::contains($key->name, 'funcionários'))
                    <option value="{{$key->id}}" {{ in_array($key->id, $rolePermissions, true) ? 'selected' : '' }} >{{$key->name}}</option>
                @endif
          @endforeach
        </optgroup>
        <optgroup label="Funcionários">
            @foreach ($permission as $key)
              @if (Str::contains($key->name, 'funcionários'))
                <option value="{{$key->id}}" {{ in_array($key->id, $rolePermissions, true) ? 'selected' : '' }} >{{$key->name}}</option>
              @endif
          @endforeach
        </optgroup>
        <optgroup label="Clientes">
            @foreach ($permission as $key)
              @if (Str::contains($key->name, 'clientes'))
                <option value="{{$key->id}}" {{ in_array($key->id, $rolePermissions, true) ? 'selected' : '' }} >{{$key->name}}</option>
              @endif
          @endforeach
          </optgroup>
      </select>
      <div class="form-row m-1">
        <x-adminlte-button class="btn-flat" type="submit" label="Salvar" theme="success" icon="fas fa-lg fa-save"/>
      </div>
</form>
@endsection
