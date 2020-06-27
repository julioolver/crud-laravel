<?php $__env->startSection('title', 'Adcionar cidade'); ?>

<?php $__env->startSection('body'); ?>

    <div class="container">
        <h3 class="center">Editando cidade</h3>
        <div class="row">
            <form action="<?php echo e($formAction); ?>" method="post" role="form" id="form" name="form"
                  enctype="multipart/form-data">

                <?php echo e(csrf_field()); ?>



                <?php echo $__env->make('cidade._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <button class="btn">Atualizar</button>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projetos-laravel\crud-laravel\resources\views/cidade/edit.blade.php ENDPATH**/ ?>