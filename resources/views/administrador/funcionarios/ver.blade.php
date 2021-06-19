@extends('adminlte::page')

@section('content')
<h1>{{$funcionario->name}}</h1>
<div class="row mt-2">
    <a href="{{route('funcionarios')}}">
        <x-adminlte-button label="Voltar" type="button" theme="primary" icon="fas fa-chevron-circle-left"/>
    </a>
</div>
    @php
        $heads = [
            'funções',
        ];

        if (!empty(Arr::first($funcionarioRole))) {
            $data = array();
            foreach ($funcionarioRole as $role) {
                $data[] = [$role];
            }
            $config = [
                'data' => $data,
                'order' => [[1, 'asc']],
                'columns' => [null],
            ];
        } else {
            $config = [
                'data' => [
                    ['Não há funções cadastradas'],
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
