@extends('layout.index')

@section('title', 'Listagem de Clientes')

@section('body')
    <style>
        body {
            background-color: #aab7b8;
        }

        .swal-overlay {
            background-color: rgba(43, 165, 137, 0.45);
        }

        .swal-modal {
            width: 350px;
            margin-bottom: 200px;
        }
    </style>

    <div class="container" style="width: 100%;" role="main">
        <div class="row">
            <h4 class="center">Lista de Clientes</h4><br>
            <form action="{{route('cliente.search')}}" method="POST">
                {{ csrf_field() }}

                <div class="row" style="margin-bottom: -30px">
                    <a title="Adicionar.." href="{{ route('cliente.create') }}"
                       class="btn-floating btn-large waves-effect waves-light" style="float: left"> <i
                            class="material-icons">add</i></a>

                    <div class="input-field col s4" style=" margin-left: 50px">
                        <i class="material-icons prefix">person_search</i>
                        <input style="color: black" type="text" name="nome" id="nome"
                               value="{{ isset($dadosBusca['nome']) ? $dadosBusca['nome'] : '' }}">
                        <label for="nome" style="color: black">Nome do Cliente</label>
                    </div>
                    <div class="input-field col s2" style="">
                        <select name="cid_id" id="cid_id">
                            <option value="" disabled selected>Escolha uma Cidade</option>
                            @foreach($cidades as $cidade)
                                <option
                                    value="{{ $cidade->id }}" {{ isset($dadosBusca['cid_id']) && $dadosBusca['cid_id'] == $cidade->id ? 'selected' : '' }}> {{ $cidade->nome }}</option>
                            @endforeach
                        </select>

                        <label for="cid_id" style="color: black">Cidade</label>
                    </div>
                    <div class="input-field col s2" style="">
                        <select name="situacao" id="situacao" style="background: whitesmoke" class="situacao">
                            <option value="" disabled selected>Escolha uma Situação</option>
                            <option
                                value="0" {{ isset($dadosBusca['situacao']) && !$dadosBusca['situacao'] ? 'selected' : '' }}>
                                Inativo
                            </option>
                            <option
                                value="1" {{ isset($dadosBusca['situacao']) && $dadosBusca['situacao'] ? 'selected' : '' }}>
                                Ativo
                            </option>
                        </select>

                        <label for="situacao" style="color: black">Situação</label>

                    </div>
                    <div class="input-field col s3">
                        <button type="submit" class="btn-floating btn-large waves-effect waves-light" id="buscar"
                                title="Buscar">
                            <i class="material-icons">search</i>
                        </button>
                        <a href="{{ route('cliente.index') }}" title="Limpar"
                           class="btn-floating btn-large waves-effect waves-light"
                           style="background-color: #ef5350">
                            <i class="material-icons">clear</i>Limpar
                        </a>
                    </div>
                </div>
            </form>

        </div>
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}"/>

        <div class="row">
            <table class=" table hoverable z-depth-5" style="background-color: aliceblue; font-size: 14px;">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>telefone</td>
                    <td>email</td>
                    <td>Ativo?</td>
                    <td style="padding-left: 30px">Ações</td>
                </tr>
                </thead>

                <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->telefone }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td class="switch">
                            <p>
                                <label>
                                    <input type="checkbox" class="situacao" data-cliente="{{ $cliente->id }}"
                                           name="situacao" {{ $cliente->situacao == 1 ? 'checked' : '' }}>
                                    <span class="lever"></span>
                                </label>
                            </p>
                        </td>
                        <td style="width: 10%">
                            <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn"><i
                                    class="material-icons prefix">edit</i></a>

                            <a onclick="confirmacaoExcluirRegistro('{{ $cliente->id }}', '{{ route('cliente.destroy', [$cliente->id, $cliente->nome]) }}') "
                               href="#modal1"
                               data-name="{{ $cliente->nome }}"
                               class="btn red modal-trigger waves-effect waves-light btn modal-trigger"><i
                                    class="material-icons prefix delete">delete</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="row" align="center">
                @if(isset($dadosBusca))
                    {!! $clientes->appends($dadosBusca)->links() !!}
                @else

                    {{ $clientes->links() }}
                @endif
            </div>
        </div>
        <div class="row">
            <a href="{{ route('cliente.create') }}" class="btn" style="float: right">Adicionar</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".situacao").change(function () {
            let url = '{{ route('cliente.update-fast') }}';
            let data = {
                _token: $('#token').val(),
                cliente: $(this).data('cliente'),
                situacao: $(this).is(':checked') ? 1 : 0
            };

            solicitaRequisicao(url, data);
        });

        $(document).ready(function () {
            $('select').formSelect();
        });
    </script>
@endsection
