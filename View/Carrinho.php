<?php session_start() ?>
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
				<a class="nav-item nav-link" href="./HomePage.php">Home</a>
				<a class="nav-item nav-link active" href="#">Carrinho <span class="sr-only">(current)</span></a>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nome</th>
						<th scope="col">Preço</th>
						<th scope="col">Ação</th>
					</tr>
				</thead>
				<tbody>
					<!-- Inicio do loop de produtos -->
					<?php
					require_once '../Model/Produto.php';
					if (empty($_SESSION['produtos'])) 
					{
						echo '
					    <tr>
						    <td colspan="4" style="text-align:center">O carrinho está vazio...</td>
					    </tr>
					    ';
					} 
					else 
					{					
						foreach ($_SESSION['produtos'] as $produto_serial) 
						{
							$produto = unserialize($produto_serial);
						    echo '
						    <tr>
							    <th scope="row">'.$produto->getId().'</th>
							    <td>'.$produto->getNome().'</td>
							    <td>R$ '.$produto->getPreco().'</td>
							    <td><a href="../Controller/ControllerCarrinho.php?id='.$produto->getId().'&action=delete">Excluir</a></td>
						    </tr>
						    ';
						}
					}
					if (isset($_SESSION['total']) && round($_SESSION['total'], 2) > 0)
					{
						echo '
						<tr class="table-info">
							<td colspan="4" style="text-align:center">
								<h3>Total R$ '.round($_SESSION['total'], 2).'</h3>
							</td>
						</tr>
						';
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>