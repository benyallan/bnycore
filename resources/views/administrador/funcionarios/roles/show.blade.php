@extends('adminlte::page')

@section('content')
<h1>{{$role->name}}</h1>
<div class="row mt-2">
    <a href="{{route('roles.index')}}">
        <x-adminlte-button label="Voltar" type="button" theme="primary" icon="fas fa-chevron-circle-left"/>
    </a>
</div>
    @php
        $heads = [
            'permissão',
        ];

        if (!empty(Arr::first($rolePermissions))) {
            $data = array();
            foreach ($rolePermissions as $permission) {
                $data[] = [$permission->name];
            }
            $config = [
                'data' => $data,
                'order' => [[1, 'asc']],
                'columns' => [null],
            ];
        } else {
            $config = [
                'data' => [
                    ['Não há permissões cadastradas'],
                ],
                'columns' => [null],
            ];
        }
    @endphp

    {{-- Dados de exemplo / preenchimento mínimos usando o slot de componente --}}
    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" theme="light" striped hoverable with-buttons>
        @foreach($config['data'] as $row)
            <tr>
                @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
            </tr>
        @endforeach
    </x-adminlte-datatable>
@endsection
