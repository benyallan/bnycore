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

        <select name="permission[]" data-actions-box="true" class="selectpicker" data-width="100%" multiple title="Escolha as permissões..." data-style="btn-info">
            <optgroup label="Funções">
              @foreach ($permission as $key)
                    @if (Str::contains($key->name, 'funções') && !Str::contains($key->name, 'funcionários'))
                        <option value="{{$key->id}}">{{$key->name}}</option>
                    @endif
              @endforeach
            </optgroup>
            <optgroup label="Funcionários">
                @foreach ($permission as $key)
                  @if (Str::contains($key->name, 'funcionários'))
                    <option value="{{$key->id}}">{{$key->name}}</option>
                  @endif
              @endforeach
            </optgroup>
            <optgroup label="Clientes">
                @foreach ($permission as $key)
                  @if (Str::contains($key->name, 'clientes'))
                    <option value="{{$key->id}}">{{$key->name}}</option>
                  @endif
              @endforeach
              </optgroup>
          </select>
        <x-adminlte-button label="Criar" type="submit" theme="success" icon="fas fa-plus-square"/>
    </form>
</div>
@endsection
