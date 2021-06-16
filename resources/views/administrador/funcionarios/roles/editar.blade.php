@extends('adminlte::page')

@section('content')

<form action="" method="post">
    {{-- With prepend slot --}}
    <x-adminlte-input name="role" label="Função" placeholder="{{$role->name}}" label-class="text-lightblue">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-briefcase text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <select data-actions-box="true" class="selectpicker" data-width="100%" multiple title="Escolha as permissões..." data-style="btn-info">
        <optgroup label="Funções">
          @foreach ($permission as $key)
              @if (Str::contains($key->name, 'funções') && !Str::contains($key->name, 'funcionários'))
                <option>{{$key->name}}</option>
              @endif
          @endforeach
        </optgroup>
        <optgroup label="Funcionários">
            @foreach ($permission as $key)
              @if (Str::contains($key->name, 'funcionários'))
                <option>{{$key->name}}</option>
              @endif
          @endforeach
        </optgroup>
        <optgroup label="Clientes">
            @foreach ($permission as $key)
              @if (Str::contains($key->name, 'clientes'))
                <option>{{$key->name}}</option>
              @endif
          @endforeach
          </optgroup>
      </select>
</form>

@endsection
