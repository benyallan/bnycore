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

            foreach ($funcionarios as $funcionario) {
                $data = [
                    [$funcionario->id, $funcionario->name, $funcionario->email, '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                ];
            }
            $config = [
                'data' => $data,
                'order' => [[1, 'asc']],
                'columns' => [null, null, null, ['orderable' => false]],
            ];
        @endphp

        <div class="container m-1 text-right">
            <a href="{{ route('funcionarios.novo') }}">
                <x-adminlte-button label="Adicionar funcionário" theme="primary" icon="fas fa-user-plus"/>
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
