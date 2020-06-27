@extends('layout.index')

@section('title', 'Adcionar Cliente')

@section('body')
    <div class="container" style="color: black">
        <h3 class="center">Inserir Cliente</h3>
        <div class="row">
            <form action="{{ route('cliente.store') }}" method="post" role="form" id="form" name="form"
                  enctype="multipart/form-data">

                {{ csrf_field() }}

                @include('cliente._form')
                <div class="col s9 offset-s9">
                    <button class="btn" type="submit">Salvar</button>
                    <a class="btn red" href="{{ route('cliente.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
