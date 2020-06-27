@extends('layout.index')

@section('title', 'Adcionar cidade')

@section('body')

    <div class="container">
        <h3 class="center">Inserir Cidade</h3>
        <div class="row">
            <form action="{{ route('cidade.store') }}" method="post" role="form" id="form" name="form"
                  enctype="multipart/form-data">

                {{ csrf_field() }}

                @include('cidade._form')
                <div class="col s9 offset-s9">
                    <button class="btn" type="submit">Salvar</button>
                    <a class="btn red" href="{{ route('cidade.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
