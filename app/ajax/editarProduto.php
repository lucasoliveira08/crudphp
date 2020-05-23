<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once("../base.php");

$idProduto = htmlspecialchars($_POST["idProduto"]);
$nomeProduto = htmlspecialchars($_POST["nomeProduto"]);
$precoProduto = htmlspecialchars($_POST["precoProduto"]);
$qtdEstoque = htmlspecialchars($_POST["qtdEstoque"]);

$produto->editarProduto($idProduto, $nomeProduto, $precoProduto, $qtdEstoque);