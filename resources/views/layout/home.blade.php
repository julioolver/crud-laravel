@extends('layout.index')

@section('title', 'Bem vindo!')

@section('body')

    <div class="container" style="width: 100%;" role="main">
        <div class="row">
            <div class="center">
                <img src="{{ asset('welcome.png') }}">
                <p style="margin-top: -80px">Seja muito Bem-Vindo ao sistema CURD!<br>
                    Aqui, Poderá realizar o cadastro de Clientes, assim como Realizar Filtros, cadastro de Cidade e
                    Cadastro de Estados.<br>
                    Poderá também, inativar um cadastro direto na listagem.<br>
                    Navegue no menu acima, para acessar as telas!
                </p>
            </div>
        </div>
    </div>
@endsection
