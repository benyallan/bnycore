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

            $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>';
            $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Apagar">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>';

            $rota = route('roles.show', 1);
            $btnDetails = "<a href='$rota'>
                                <button class='btn btn-xs btn-default text-teal mx-1 shadow' title='Detalhes'>
                                    <i class='fa fa-lg fa-fw fa-eye'></i>
                                </button>
                            </a>";

            $dados = '';
            if (!empty(Arr::first($roles))) {
                $data = array();
                foreach ($roles as $role) {
                    $rota = route('roles.show', $role->id);
                    $data[] = [$role->id, $role->name, '<nobr>'.
                        "<a href='$rota'>
                                <button class='btn btn-xs btn-default text-teal mx-1 shadow' title='Detalhes'>
                                    <i class='fa fa-lg fa-fw fa-eye'></i>
                                </button>
                            </a>"
                        .$btnEdit.$btnDelete.'</nobr>'];
                }
                $dados = $data;
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

        <div class="container m-1 text-right">
            <a href="{{ route('roles.create') }}">
                <x-adminlte-button label="Adicionar função" theme="primary" icon="fas fa-user-plus"/>
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
