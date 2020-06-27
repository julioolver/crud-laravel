<?php $__env->startSection('title', 'Adcionar Cliente'); ?>

<?php $__env->startSection('body'); ?>

    <div class="container">
        <h3 class="center">Editando Cliente</h3>
        <div class="row">
            <form action="<?php echo e($formAction); ?>" method="post" role="form" id="form" name="form"
                  enctype="multipart/form-data">

                <?php echo e(csrf_field()); ?>



                <?php echo $__env->make('cliente._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col s9 offset-s9">
                    <button class="btn" type="submit">Salvar</button>
                    <a class="btn red" href="<?php echo e(route('cliente.index')); ?>">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projetos-laravel\crud-laravel\resources\views/cliente/edit.blade.php ENDPATH**/ ?>