/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
function confirmacaoExcluirConta(id, rota){
    $('.modal-delete').find('.btn-ok').attr('onclick', 'excluirConta('+id+', "'+rota+'")');
    $('.modal-delete').find('.modal-body').html('<p>Deseja realmente excluir este cidade?</p>');
    $('.modal-delete').modal();
}

function excluirConta(id, rota) {
    $('.modal-delete').modal();
    $.ajax({
        url: rota,
        data: {modal: true},
        dataType: 'json',
    }).done(function (data) {
            if (data.success) {
                swal({
                    title: "Sucesso!",
                    text: data.mensagem,
                    icon: "success",
                    button: false
                });
                setTimeout(function () {
                    window.location.href = data.redirect;
                    window.location.reload();
                }, 2300);
            } else {
                /*   $('#visualizar-contas').hide();
                   $('.gerar-cobraca').show();
                   $("#customFormModal").iziModal('destroy');
                   $('#form-modal').show();*/
                swal({
                    title: "Oops..",
                    text: "Ocorreu uma inconsistência para Excluir!",
                    icon: "error",
                    button: false
                });
                setTimeout(function () {
                    swal.close();
                }, 3000);
            }
        }
    )
    ;
}

const app = new Vue({
    el: '#app',
});
