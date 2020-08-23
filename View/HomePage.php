<!DOCTYPE html>
<html>
<head>
	<title>HomePage</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="#">Loja PHP</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link" href="./Carrinho.php">Carrinho</a>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row row-cols-1 row-cols-sm-1 row-cols-md-3">
			<?php
				for ($i = 1; $i <= 15; $i++) 
				{
					echo '
						<div id="'.$i.'" class="card" style="margin-top:5px; padding:10px">
						<img src="https://www.strokejoinville.com.br/wp-content/uploads/sites/804/2017/05/produto-sem-imagem-1.gif" class="card-img-top" alt="...">
						<div class="card-body">
						<h5 class="card-title">Produto '.$i.'</h5>
						<p class="card-text">Descrição do produto</p>
						<p class="card-text">Preço: R$ '.($i*2.7).'</p>
						<a href="../Controller/ControllerCarrinho.php?id='.$i.'&nome=Produto '.$i.'&preco='.($i*2.7).'&action=add" class="btn btn-primary">Adicionar ao Carrinho</a>
						</div>
						</div>
					';
				}
			?>
		</div>
	</div>
</body>
</html>