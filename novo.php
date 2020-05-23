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
  
  <h3 class="page-header">Novo Produto</h3>
  
  <form name="frmProduto">
  	<div class="row">
  	  <div class="form-group col-md-4">
  	  	<label for="nomeProduto">Nome Produto</label>
  	  	<input type="text" class="form-control" id="nomeProduto" name="nomeProduto" placeholder="Digite o nome do produto">
  	  </div>
	  <div class="form-group col-md-4">
  	  	<label for="precoProduto">Preço Produto</label>
  	  	<input type="number" class="form-control" id="precoProduto" name="precoProduto" placeholder="Digite o preço do produto">
  	  </div>
	  <div class="form-group col-md-4">
  	  	<label for="qtdEstoque">Quantidade Estoque</label>
  	  	<input type="number" class="form-control" id="qtdEstoque" name="qtdEstoque" placeholder="Digite a quantidade em estoque">
		</div>
</div>
	
	<hr />
	
	<div class="row">
	  <div class="col-md-12">
	  	<button type="button" class="btn btn-primary" id="btnCadastrar">Cadastrar</button>
		<a href="index.php" class="btn btn-default">Cancelar</a>
	  </div>
	</div>

  </form>
 </div>
 

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>
</html>

<script>
	$(document).ready(function(){
			$("#btnCadastrar").on('click', function(e){
				e.preventDefault();
			var formData = new FormData($("form[name='frmProduto']")[0]);
			console.log(formData);
			$.ajax({
				type: 'POST',
				data: formData,
				url: 'app/ajax/novoProduto.php',
				processData: false,
				contentType: false,
				beforeSend: function(){
					$(this).html("<img src='img/ajax-loader.gif'>");
				},
				success: function(response){
					$(this).html("Cadastrar");
					response = JSON.parse(response);
					if(response.sucesso == 1){
						Swal.fire({
                                icon: 'success',
                                title: 'Sucesso...',
                                text: 'Produto registrado com sucesso...'
                            }).then(function() {
                               	location.href='index.php';
                            });
					} else if(response.sucesso == 0){
						Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Algo deu errado...'
                            });
					} else if(response.vazio == 0){
						Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Preencha todos os campos...'
                            });
					}
				}
			});
		}); 
	});
</script>