@extends('layout.index')

@section('title', 'Listagem de cidades')

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
        <h4 class="center">Lista de cidades</h4><br>
        <form action="{{route('cidade.search')}}" method="POST">
                        {{ csrf_field() }}

            <div class="row" style="margin-bottom: -30px">
                <a title="Adicionar.." href="{{ route('cidade.create') }}"
                   class="btn-floating btn-large waves-effect waves-light" style="float: left"> <i
                        class="material-icons">add</i></a>

                <div class="input-field col s4" style=" margin-left: 50px">
                    <i class="material-icons prefix">location_on</i>
                    <input style="color: black" type="text" name="nome" id="nome" value="{{ isset($dadosBusca['nome']) ? $dadosBusca['nome'] : '' }}">
                    <label for="nome" style="color: black">Nome da cidade</label>
                </div>
                <div class="input-field col s2" style="">
                    <select name="est_id" id="est_id">
                        <option value="" disabled selected>Escolha um Estado</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado->id }}" {{ isset($dadosBusca['est_id']) && $dadosBusca['est_id'] == $estado->id ? 'selected' : '' }}> {{ $estado->uf }}</option>
                        @endforeach
                    </select>

                    <label for="est_id" style="color: black">Estado</label>
                </div>

                <div class="input-field col s2" style="">
                    <select name="situacao" id="situacao" style="background: whitesmoke" class="situacao">
                        <option value="" disabled selected>Escolha uma Situação</option>
                        <option value="0">Inativo</option>
                        <option value="1">Ativo</option>
                    </select>

                    <label for="situacao" style="color: black">Situação</label>

                </div>
                <div class="input-field col s3">
                    <div class="input-field " style="margin-top: 2px; margin-left: 15px">
                        <button type="submit" class="btn-floating btn-large waves-effect waves-light" id="buscar"
                                title="Buscar">
                            <i class="material-icons">search</i>
                        </button>
                        <a href="{{ route('cidade.index') }}" title="Limpar"
                           class="btn-floating btn-large waves-effect waves-light" style="background-color: #ef5350">
                            <i class="material-icons">clear</i>Limpar
                        </a>
                    </div>
                </div>
            </div>
        </form>
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}"/>

        <div class="row">
            <table class=" table hoverable z-depth-5 responsive-table" style="background-color: aliceblue; font-size: 14px;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Ativo?</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                @foreach($cidades as $cidade)
                    <tr>
                        <td>{{ $cidade->id }}</td>
                        <td>{{ $cidade->nome }}</td>
                        <td>{{ $cidade->estado->uf }}</td>
                        <td class="switch">
                            <p>
                                <label>
                                    <input type="checkbox" class="situacao" data-cidade="{{ $cidade->id }}"
                                           name="situacao" {{ $cidade->situacao == 1 ? 'checked' : '' }}>
                                    <span class="lever"></span>
                                </label>
                            </p>
                        </td>
                        <td style="width: 10%">
                            <a href="{{ route('cidade.edit', $cidade->id) }}" class="btn"><i
                                    class="material-icons prefix">edit</i></a>

                            <a onclick="confirmacaoExcluirRegistro('{{ $cidade->id }}', '{{ route('cidade.destroy', [$cidade->id, $cidade->nome]) }}') " href="#modal1"
                               data-name="{{ $cidade->nome }}" class="btn red modal-trigger waves-effect waves-light btn modal-trigger"><i
                                    class="material-icons prefix delete">delete</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row" align="center">
                @if(isset($dadosBusca))
                    {!! $cidades->appends($dadosBusca)->links() !!}
                @else

                    {{ $cidades->links() }}
                @endif
            </div>
        </div>
        <div class="row">
            <a href="{{ route('cidade.create') }}" class="btn" style="float: right">Adicionar</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".situacao").change(function () {
            let url = '{{ route('cidade.update-fast') }}';
            let data = {
                _token: $('#token').val(),
                cidade: $(this).data('cidade'),
                situacao: $(this).is(':checked') ? 1 : 0
            };
            solicitaRequisicao(url, data);
        });

        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
@endsection
