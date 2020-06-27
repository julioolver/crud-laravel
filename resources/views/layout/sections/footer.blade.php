<footer class="page-footer footer" style="">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Sistema de CRUD</h5>
            </div>  <div class="col l6 s12">
                <h5 class="white-text">Laravel 5.8 + Materialize</h5>
            </div>
            <div class="col l6  s12">
                <h5 class="white-text text-lighten-4">Redes Sociais</h5>

                   <a class="grey-text text-lighten-5" target="_blank" href="https://www.linkedin.com/in/julio-cesar-oliveira-da-silva-957593169/"><img src="https://img.icons8.com/ios/24/000000/linkedin.png"/></a>
                   <a class="grey-text text-lighten-5" target="_blank" href="https://www.facebook.com/julio.cesar.731135/"><img src="https://img.icons8.com/material/24/000000/facebook-circled.png"/></a>

            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2020 Copyright Julio Cesar
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@yield('scripts')
<script type="text/javascript">
    $('.dropdown-trigger').dropdown();

    $(document).ready(function(){
        $('.sidenav').sidenav();
    });

    /*$(document).ready(function(){
        $('select').formSelect();
    });*/

    function confirmacaoExcluirRegistro(id, rota){
        $('.modal-delete').find('.btn-ok').attr('onclick', 'excluirRegistro('+id+', "'+rota+'")');
        $('.modal-delete').find('.modal-body').html('<p>Deseja realmente excluir este Registro?</p>');
        $('.modal-delete').modal();
    }

    function excluirRegistro(id, rota) {
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
                    }, 2500);
                } else {
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
    };

    function solicitaRequisicao(url, data) {
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    swal({
                        title: "Sucesso!",
                        text: data.mensagem,
                        icon: "success",
                        button: false
                    });
                    setTimeout(function () {
                        swal.close();
                    }, 2300);
                } else {
                    swal({
                        title: "Oops..",
                        text: "Ocorreu uma inconsistência para atualizar os dados!",
                        icon: "error",
                        button: false
                    });
                    setTimeout(function () {
                        swal.close();
                    }, 3000);
                }
            },
        });
    }
</script>
</body>
</html>
