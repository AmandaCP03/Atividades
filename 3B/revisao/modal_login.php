<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form name="login" method="POST" action="autenticacao.php"> 
        <div id="formulario" class="justify-content-center">
                <div class="form-group row">
                    <div class="col-auto col-lg-12">
                        <input type="email" name="email_login" placeholder="email..." class="form-control" /><br/>
                    </div>

                    <div class="col-auto col-lg-12">
                        <input type="password" name="senha_login" placeholder="Senha..." class="form-control">
                    </div>
                </div>
        </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary autenticar">Entrar</button>
      </div>
    </div>
  </div>
</div>
<script src="js/md5.js"></script>
<script>
  $(function(){
    $(".autenticar").click(function(){
      console.log("Ola");
      var senha_md5 = $.md5($("input[name='senha_login']").val());
      $("input[name='senha_login']").val(senha_md5);
      $("form[name='login']").submit();
    });
  });
</script>