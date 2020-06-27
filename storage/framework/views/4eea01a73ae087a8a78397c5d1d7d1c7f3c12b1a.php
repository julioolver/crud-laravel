<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css">

    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: #ebe1ff;
        }

        main {
            flex: 1 0 auto;
        }

        .swal-overlay {
            background-color: rgba(43, 165, 137, 0.45);
        }

        .swal-modal {
            width: 350px;
            margin-bottom: 200px;
        }

        label{
            color: black;
        }
    </style>
    <style>


    </style>
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
<header>
    <nav class="nav-extended">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo"><span class="material-icons">
computer
</span></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/">Home</a></li>
            </ul>
        </div>
        <div class="nav-content">
            <ul class="tabs tabs-transparent">
                <li class="tab col s2">
                    <a target="_self" href="<?php echo e(route('cliente.index')); ?>"
                       class="<?php echo e(\Illuminate\Support\Facades\Request::url() == route('cliente.index') ? "active" : ""); ?>">Clientes</a>
                </li>

                <li class="tab col s2">
                    <a target="_self"
                       class="<?php echo e(\Illuminate\Support\Facades\Request::url() == route('cidade.index') ? "active" : ""); ?>"
                       href="<?php echo e(route('cidade.index')); ?>">Cidades</a>
                </li>
                <li class="tab col s2">
                    <a target="_self"
                       class="<?php echo e(\Illuminate\Support\Facades\Request::url() == route('estado.index') ? "active" : ""); ?>"
                       href="<?php echo e(route('estado.index')); ?>">Estados</a>
                </li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="<?php echo e(route('cliente.index')); ?>">Clientes</a></li>
        <li><a href="<?php echo e(route('cidade.index')); ?>">Cidades</a></li>
        <li><a href="<?php echo e(route('estado.index')); ?>">Estados</a></li>
    </ul>
</header>


<!-- Modal Trigger -->
<div id="modal1" class="modal modal-delete" style="width: 40%">
    <div class="modal-header center">
        <h4 class="modal-title" id="modal-confirm-delete-function">Confirmação</h4>
    </div>
    <div class="modal-body container center">

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat btn-ok green">Confirmar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat red">Cancelar</a>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\projetos-laravel\crud-laravel\resources\views/layout/sections/header.blade.php ENDPATH**/ ?>