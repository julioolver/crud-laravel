<?php $__env->startSection('title', 'Listagem de estados'); ?>

<?php $__env->startSection('body'); ?>

    <div class="container" style="width: 100%;" role="main">
        <div class="row">
            <div class="center">
                <img src="<?php echo e(asset('welcome.png')); ?>">
                <p style="margin-top: -80px">Seja muito Bem-Vindo ao sistema CURD!<br>
                    Aqui, Poderá realizar o cadastro de Clientes, assim como Realizar Filtros, cadastro de Cidade e
                    Cadastro de Estados.<br>
                    Poderá também, inativar um cadastro direto na listagem.<br>
                    Navegue no menu acima, para acessar as telas!
                </p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projetos-laravel\crud-laravel\resources\views/layout/home.blade.php ENDPATH**/ ?>