<?php $__env->startSection('title', 'Listagem de estados'); ?>

<?php $__env->startSection('body'); ?>

    <style>
        body {
            background-color: #aab7b8;
        }
    </style>
    <?php if(!$estados->count()): ?>
        <div class="center">
            <img src="<?php echo e(asset('ops.png')); ?>" style="width: 415px">
            <p>Nenhum Registro Encontrado! Clique para Adicionar um Novo</p>
        </div>
    <?php else: ?>
    <div class="container" style="width: 100%;" role="main">
        <h4 class="center">Lista de Estados</h4><br>
        <form action="<?php echo e(route('estado.search')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>


            <div class="row" style="margin-bottom: -30px">
                <a title="Adicionar.." href="<?php echo e(route('estado.create')); ?>"
                   class="btn-floating btn-large waves-effect waves-light" style="float: left"> <i
                        class="material-icons">add</i></a>

                <div class="input-field col s4" style=" margin-left: 50px">
                    <i class="material-icons prefix">location_on</i>
                    <input style="color: black" type="text" name="nome" id="nome" value="<?php echo e(isset($dadosBusca['nome']) ? $dadosBusca['nome'] : ''); ?>">
                    <label for="nome" style="color: black">Nome do estado</label>
                </div>

                <div class="input-field col s2" style="">
                    <i class="material-icons prefix">location_on</i>
                    <input style="color: black" type="text" name="uf" id="uf" value="<?php echo e(isset($dadosBusca['uf']) ? $dadosBusca['uf'] : ''); ?>" maxlength="2">
                    <label for="uf" style="color: black">UF</label>
                </div>

                <div class="input-field col s2" style="">
                    <select name="situacao" id="situacao" style="background: whitesmoke" class="situacao">
                        <option value="" disabled selected>Escolha uma Situação</option>
                        <option value="0">Inativo</option>
                        <option value="1">Ativo</option>
                    </select>
                    <label for="situacao" style="color: black">Situação</label>
                </div>

                <div class="input-field col s3">
                    <div class="input-field " style="margin-top: 2px; margin-left: 15px">
                        <button type="submit" class="btn-floating btn-large waves-effect waves-light" id="buscar"
                                title="Buscar">
                            <i class="material-icons">search</i>
                        </button>
                        <a href="<?php echo e(route('estado.index')); ?>" title="Limpar"
                           class="btn-floating btn-large waves-effect waves-light" style="background-color: #ef5350">
                            <i class="material-icons">clear</i>Limpar
                        </a>
                    </div>
                </div>
            </div>
        </form>
        <input type="hidden" id="token" name="_token" value="<?php echo e(csrf_token()); ?>"/>

        <div class="row">
            <table class=" table hoverable z-depth-5 responsive-table" style="background-color: aliceblue; font-size: 14px;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>uf</th>
                    <th>Ativo?</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($estado->id); ?></td>
                        <td><?php echo e($estado->nome); ?></td>
                        <td><?php echo e($estado->uf); ?></td>
                        <td class="switch">
                            <p>
                                <label>
                                    <input type="checkbox" class="situacao" data-estado="<?php echo e($estado->id); ?>"
                                           name="situacao" <?php echo e($estado->situacao == 1 ? 'checked' : ''); ?>>
                                    <span class="lever"></span>
                                </label>
                            </p>
                        </td>
                        <td style="width: 10%">
                            <a href="<?php echo e(route('estado.edit', $estado->id)); ?>" class="btn"><i
                                    class="material-icons prefix">edit</i></a>

                            <a onclick="confirmacaoExcluirRegistro('<?php echo e($estado->id); ?>', '<?php echo e(route('estado.destroy', [$estado->id, $estado->nome])); ?>') " href="#modal1"
                               data-name="<?php echo e($estado->nome); ?>" class="btn red modal-trigger waves-effect waves-light btn modal-trigger"><i
                                    class="material-icons prefix delete">delete</i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="row" align="center">
                <?php echo e($estados->links()); ?>

            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <a href="<?php echo e(route('estado.create')); ?>" class="btn" style="float: right">Adicionar</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $(".situacao").change(function () {
            let data = {
                _token: $('#token').val(),
                estado: $(this).data('estado'),
                situacao: $(this).is(':checked') ? 1 : 0
            };

            solicitaRequisicao(url, data);
        });

        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projetos-laravel\crud-laravel\resources\views/estado/index.blade.php ENDPATH**/ ?>