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
  	  	<label for="idProduto">ID Produto</label>
  	  	<input type="number" class="form-control" id="idProduto" name="idProduto" value="<?=$_GET['id']?>" readonly>
  	  </div>
  	  <div class="form-group col-md-4">
  	  	<label for="nomeProduto">Nome Produto</label>
  	  	<input type="text" class="form-control" id="nomeProduto" name="nomeProduto" disabled>
  	  </div>
	  <div class="form-group col-md-4">
  	  	<label for="precoProduto">Preço Produto</label>
  	  	<input type="number" class="form-control" id="precoProduto" name="precoProduto" disabled>
  	  </div>
	  <div class="form-group col-md-4">
  	  	<label for="qtdEstoque">Quantidade Estoque</label>
  	  	<input type="number" class="form-control" id="qtdEstoque" name="qtdEstoque" disabled>
		</div>
</div>
	
	<hr />

	<div class="row">
	  <div class="col-md-12">
		<a href="index.php" class="btn btn-default">Voltar</a>
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
	function listarProduto(){
		let idProduto = $("#idProduto").val();
        $.ajax({
            url: "app/ajax/listarProduto.php",
			data: {idProduto: idProduto},
			type: 'POST',
            success: function(response){
                if(response.trim()){
					response = JSON.parse(response);
					$("#nomeProduto").val(response.nomeProduto);
					$("#precoProduto").val(response.precoProduto);
					$("#qtdEstoque").val(response.qtdEstoque);
                } else{ 
					location.href='index.php';
                }
            }
        });
	}

	$(document).ready(function(){
		listarProduto();
	});
</script>