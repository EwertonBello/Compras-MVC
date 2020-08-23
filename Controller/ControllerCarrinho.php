<?php
session_start();

require_once '../Model/Produto.php';
require_once '../Model/Carrinho.php';

if (!isset($_GET['action']) || !isset($_GET['id'])) 
{
	header('location: ../View/HomePage.php');
	exit;
}

$acao_prod = $_GET['action'];

if ($acao_prod == 'add' && (isset($_GET['id']) && isset($_GET['nome']) && isset($_GET['preco']))) 
{	
	$id_prod = $_GET['id'];
	$nome_prod = $_GET['nome'];
	$preco_prod = $_GET['preco'];

	$produto = new Produto();
	$produto->setId($id_prod);
	$produto->setNome($nome_prod);
	$produto->setPreco($preco_prod);

	$_SESSION["produtos"][$id_prod] = serialize($produto);

	$carrinho = new Carrinho();
	$carrinho->setProdutos($_SESSION["produtos"]);
	$_SESSION["total"] = $carrinho->calcularTotal();
}
else if ($acao_prod == 'delete')
{
	$id_prod = $_GET['id'];
	$_SESSION["total"] -= unserialize($_SESSION["produtos"][$id_prod])->getPreco();
	unset($_SESSION["produtos"][$id_prod]);
}

header('location: ../View/Carrinho.php');
