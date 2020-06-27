<div class="input-field col s6">
    <input title="Nome" type="text" name="nome" id="nome" required maxlength="50" class="validate"
           value="<?php echo e(isset($cidade->nome) ? $cidade->nome : ""); ?>">
    <label for="nome">Nome</label>
</div>
<label for="estado">Estado</label><br>
<div class="input-field col s6">

    <select name="est_id" class="estados" id="estado" style="width: 80%" required class="validate">
        <option value="" disabled <?php echo e(!isset($cidade->est_id) ? 'selected' : ''); ?>>Escolha um Estado</option>
        <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($estado->id); ?>"
                    name="est_id" <?php echo e(isset($cidade->est_id) && $cidade->est_id == $estado->id  ? 'selected' : ''); ?>><?php echo e($estado->nome); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.estados').select2();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\projetos-laravel\crud-laravel\resources\views/cidade/_form.blade.php ENDPATH**/ ?>