<div class="input-field col s6">
    <i class="material-icons prefix">emoji_people</i>
    <input title="Nome" type="text" name="nome" id="nome"  required pattern="[A-Za-zÀ-ú\s]+$" data-error="Preencha o campo Nome" maxlength="50" class="validate"
           value="<?php echo e(isset($cliente->nome) ? $cliente->nome : ""); ?>">
    <label for="nome"> nome</label>
    <span class="helper-text" data-error="Preencha o nome Corretamente" data-success="Muito Bom!">Digite o Nome Corretamente</span>
</div>

<div class="input-field col s6">
    <i class="material-icons prefix">phone</i>
    <input type="text" name="telefone" id="telefone" required class="validate"
           value="<?php echo e(isset($cliente->telefone) ? $cliente->telefone : ""); ?>">
    <label for="telefone">Telefone</label>
    <span class="helper-text" data-error="Digite Apenas Números" data-success="Muito Bom!">Digite Apenas Números</span>
</div>

<div class="input-field col s6">
    <i class="material-icons prefix">email</i>
    <input type="email" name="email" id="email" value="<?php echo e(isset($cliente->email) ? $cliente->email : ""); ?>" class="validate">
    <label for="email">Email</label>
    <span class="helper-text" data-error="Informe o E-mail corretamente" data-success="Muito Bom!">Informe seue E-mail</span>
</div>

<div class="input-field col s6">
    <i class="material-icons prefix">date_range</i>
    <input type="date" name="data_nascimento"
           value="<?php echo e(isset($cliente->data_nascimento) ? $cliente->data_nascimento : ""); ?>" required class="validate">
    <label for="">Data de Nascimento</label>
    <span class="helper-text" data-error="Informe a Data de Nascimento" data-success="Muito Bom!"></span>
</div>

<div class="input-field col s6">
    <i class="material-icons prefix">location_on</i>
    <label for="">Cidade</label><br><br>

    <select name="cid_id" class="cidades validate" id="cidade" style="width: 80%" required>
        <option value="" disabled <?php echo e(!isset($cliente->cid_id) ? 'selected' : ''); ?>>Escolha uma cidade</option>
        <?php $__currentLoopData = $cidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($cidade->id); ?>" name="cid_id" <?php echo e(isset($cliente->cid_id) && $cliente->cid_id == $cidade->id  ? 'selected' : ''); ?>><?php echo e($cidade->nome); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <span class="helper-text" data-error="Informe a Cidade" data-success="Muito Bom!"></span>
</div>
<div class="input-field col s6">
    <label for="situacao" style="color: black">Ativo?</label><br>
    <div class="switch">
        <p>
            <label>
                Inativo
                <input type="checkbox" checked name="situacao" id="situacao" value="1">
                <span class="lever"></span>
                Ativo
            </label>
        </p>
    </div>
</div>
<br><br>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/jQuery-Mask-Plugin-master/src/jquery.mask.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.cidades').select2();
        });

        $('#telefone').mask('(99) 99999-9999');

    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\projetos-laravel\crud-laravel\resources\views/cliente/_form.blade.php ENDPATH**/ ?>