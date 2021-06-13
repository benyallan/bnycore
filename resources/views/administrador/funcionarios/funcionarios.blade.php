@extends('adminlte::page')

@section('content')
    <div class="container">
        {{-- Dados de configuração para tabelas de dados --}}
        @php
            $heads = [
                'ID',
                'Name',
                ['label' => 'Phone', 'width' => 40],
                ['label' => 'Actions', 'no-export' => true, 'width' => 5],
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

            $config = [
                'data' => [
                    [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                    [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                    [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                ],
                'order' => [[1, 'asc']],
                'columns' => [null, null, null, ['orderable' => false]],
            ];
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

        {{-- Compactado com opções de estilo / dados de preenchimento usando a configuração do plugin --}}
        <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config"
            striped hoverable bordered compressed/>

    </div>
@endsection
