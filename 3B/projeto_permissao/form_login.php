<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Autenticação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name='login' method="post" action="autenticacao.php">
      <div class="modal-body">
        <input type="text" name="email" placeholder="Email..." class="input-control col-12" />
        <input type="password" name="senha" placeholder="Senha..." class="input-control col-12" />
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary col-3" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary autenticar col-8">Autenticar</button>
      </div>
      </form>
      <div>
          Ainda Não é cadastrado?<a href='#' class='link_bg_claro'>clique aqui</a>
      </div>
    </div>
  </div>
</div>
<script>
  $(function(){
    $(".autenticar").click(function(){
      var senha_md5 = $.md5($("input[name='senha']").val());
      $("input[name='senha']").val(senha_md5);
      $("form[name='login']").submit();
    });
  });
</script>