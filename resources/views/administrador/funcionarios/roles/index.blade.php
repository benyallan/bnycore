@extends('adminlte::page')

@section('content')
    <div class="container">
        {{-- Dados de configuração para tabelas de dados --}}
        @php
            $heads = [
                'ID',
                'Função',
                ['label' => 'Ações', 'no-export' => true, 'width' => 5],
            ];

            if (!empty(Arr::first($roles))) {
                $data = array();
                foreach ($roles as $role) {
                    $token = csrf_token();
                    $ver = route('roles.show', $role->id);
                    $editar = route('roles.editar', $role->id);
                    $apagar = route('roles.apagar', $role->id);
                    $data[] = [$role->id, $role->name,
                        "<span style='white-space: nowrap; flex-wrap: nowrap;'><a href='$ver'>
                            <button class='btn btn-xs btn-default text-teal mx-1 shadow' title='Detalhes'>
                                <i class='fa fa-lg fa-fw fa-eye'></i>
                            </button>
                        </a>
                        <a href='$editar'>
                            <button class='btn btn-xs btn-default text-primary mx-1 shadow' title='Editar'>
                                <i class='fa fa-lg fa-fw fa-pen'></i>
                            </button>
                        </a>
                        <form action='$apagar' method='post'>
                            <button class='btn btn-xs btn-default text-danger mx-1 shadow' title='Apagar' type='submit'>
                                <i class='fa fa-lg fa-fw fa-trash'></i>
                            </button>
                            <input type='hidden' name='_token' value='$token'>
                        </form></span>"];
                }
                $config = [
                    'data' => $data,
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, ['orderable' => false]],
                ];
            } else {
                $config = [
                    'data' => [
                        ['', 'Não há funções cadastradas', ''],
                    ],
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                ];
            }
        @endphp

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @can('criar funções')
            <div class="container m-1 text-right">
                <a href="{{ route('roles.create') }}">
                    <x-adminlte-button label="Adicionar função" theme="primary" icon="fas fa-user-plus"/>
                </a>
            </div>
        @endcan


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
    </div>
@endsection
