<?php echo $__env->make('layout.sections.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('body'); ?>

<?php echo $__env->make('layout.sections.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\projetos-laravel\crud-laravel\resources\views/layout/index.blade.php ENDPATH**/ ?>