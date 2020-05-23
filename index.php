<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Crud</title>
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Crud</a>
   </div>
  </div>
 </nav>

 <div id="main" class="container-fluid" style="margin-top: 50px">
 
 	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Produtos</h2>
        </div>
        <div class="col-sm-6"></div>
		<div class="col-sm-3">
			<a href="novo.php" class="btn btn-primary pull-right h2">Novo Produto</a>
		</div>
	</div>
 	<hr />
 	<div id="list" class="row">
	<div class="table-responsive col-md-12">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
          <th>ID</th>
					<th>Nome</th>
					<th>Preço</th>
          <th>Quantidade em Estoque</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
			<tbody id="tabelaProdutos"></tbody>
		</table>
	</div>
	
	</div>
 </div>
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnExcluirConfirma">Sim</button>
	<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
      </div>
    </div>
  </div>
</div>

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>

<script>
    function listarProdutos(){
        $("#tabelaProdutos").html("");
        $.ajax({
            url: "app/ajax/listarProdutos.php",
            beforeSend: function(){
                $("#tabelaProdutos").html("<img src='img/ajax-loader.gif'>");
            },
            success: function(response){
                $("#tabelaProdutos").html("");
                if(response.trim()){
                  response = JSON.parse(response);
                   for(var i = 0; i < response.length; i++)
                    $("#tabelaProdutos").append("<tr><td>"+response[i].idProduto+"</td><td>"+response[i].nomeProduto+"</td><td>"+response[i].precoProduto+"</td><td>"+response[i].qtdEstoque+"</td><td><td class='actions'> <a class='btn btn-success btn-xs' href='ver.php?id="+response[i].idProduto+"'>Visualizar</a><a class='btn btn-warning btn-xs' href='editar.php?id="+response[i].idProduto+"' style='margin-left: 5px;'>Editar</a><a class='btnExcluir btn btn-danger btn-xs'  href='#' data-id="+response[i].idProduto+" data-toggle='modal' data-target='#delete-modal' style='margin-left: 5px;'>Excluir</a></td></td></tr>");
                } else{ 
                  $("#tabelaProdutos").append("<td class='alert alert-info' colspan='5'>Nenhum produto registrado...</td>");
                }
            }
        });
    }

    $(document).ready(function(){
        listarProdutos();
        $(document).on('click', '.btnExcluir', function(){
                var id = $(this).data('id');
                $("#btnExcluirConfirma").data('id', id);
         });
         $('#btnExcluirConfirma').click(function(){
                var data = "id="+$(this).data('id');
            $.ajax({
                type: 'POST',
                data: data,
                url: 'app/ajax/deletarProduto.php',
                success: function (data) {
                    if(data == 0){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ocorreu um erro ao deletar este produto!'
                        });
                        
                    }else{
                        $("#delete-modal").modal('hide');
                        listarProdutos();
                    }
                    }
                });
            });
    });
</script>