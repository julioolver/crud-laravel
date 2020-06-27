<div class="input-field col s6">
    <input title="Nome" type="text" name="nome" id="nome" class="validate" required pattern="[A-Za-zÀ-ú\s]+$" data-error="Preencha o campo Nome" maxlength="50"
           value="{{ isset($estado->nome) ? $estado->nome : "" }}">
    <label for="nome" data-error="Preencha o campo Nome" class="active">Nome</label>
    <span class="helper-text" data-error="Preencha o nome Corretamente" data-success="Muito Bom!">Digite o Nome Corretamente</span>
</div>

<div class="input-field col s4">
    <input title="Nome" type="text" name="uf" id="uf" data-length="2" maxlength="2" minlength="2" required class="validate"
           value="{{ isset($estado->uf) ? $estado->uf : "" }}">
    <label for="uf"> UF</label>
    <span class="helper-text" data-error="Informe 2 Caracteres" data-success="Muito Bom!">Apenas 2 caracteres</span>
</div>

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
        $(document).ready(function() {
            $('input#uf').characterCounter();
        });
    </script>
@endsection
