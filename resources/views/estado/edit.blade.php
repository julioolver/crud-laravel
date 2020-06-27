@extends('layout.index')

@section('title', 'Adcionar estado')

@section('body')

    <div class="container">
        <h3 class="center">Editando estado</h3>
        <div class="row">
            <form action="{{ $formAction }}" method="post" role="form" id="form" name="form"
                  enctype="multipart/form-data">

                {{ csrf_field() }}

                @include('estado._form')
                <div class="col s9 offset-s9">
                    <button class="btn" type="submit">Salvar</button>
                    <a class="btn red" href="{{ route('estado.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
