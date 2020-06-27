<div class="input-field col s6">
    <input title="Nome" type="text" name="nome" id="nome" required maxlength="50" class="validate"
           value="{{ isset($cidade->nome) ? $cidade->nome : "" }}">
    <label for="nome">Nome</label>
</div>
<label for="estado">Estado</label><br>
<div class="input-field col s6">

    <select name="est_id" class="estados" id="estado" style="width: 80%" required class="validate">
        <option value="" disabled {{ !isset($cidade->est_id) ? 'selected' : '' }}>Escolha um Estado</option>
        @foreach($estados as $estado)
            <option value="{{ $estado->id }}"
                    name="est_id" {{ isset($cidade->est_id) && $cidade->est_id == $estado->id  ? 'selected' : '' }}>{{ $estado->nome }}</option>
        @endforeach
    </select>
</div><br><br><br>
<div class="input-field col s6">
    <label for="">Ativo?</label><br>
    <div class="switch">
        <p>
            <label>
                Inativo
                <input type="checkbox" checked name="situacao" value="1">
                <span class="lever"></span>
                Ativo
            </label>
        </p>
    </div>
</div>
<br><br>
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.estados').select2();
        });
    </script>
@endsection
