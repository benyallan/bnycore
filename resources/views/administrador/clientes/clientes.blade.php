@extends('adminlte::page')

@section('content')
    <div class="container">
        {{-- Dados de configuração para tabelas de dados --}}
        @php
            $heads = [
                'ID',
                'Nome',
                ['label' => 'E-mail', 'width' => 40],
                ['label' => 'Ações', 'no-export' => true, 'width' => 5],
            ];

            $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>';
            $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Apagar">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>';
            $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalhes">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>';

            if (!empty(Arr::first($clientes))) {
                foreach ($clientes as $cliente) {
                    $token = csrf_token();
                    $ver = route('clientes.ver', $cliente->id);
                    $editar = route('clientes.editar', $cliente->id);
                    $apagar = route('clientes.apagar', $cliente->id);
                    $data[] = [
                    $cliente->id, $cliente->name, $cliente->email,
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
                        </form></span>"
                ];
                }
                $config = [
                    'data' => $data,
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                ];
            } else {
                $config = [
                    'data' => [
                        ['', 'Não há clientes cadastrados', '', ''],
                    ],
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                ];
            }
        @endphp

        <div class="container m-1 text-right">
            <a href="{{ route('clientes.criar') }}">
                <x-adminlte-button label="Adicionar cliente" theme="primary" icon="fas fa-user-plus"/>
            </a>
        </div>

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
