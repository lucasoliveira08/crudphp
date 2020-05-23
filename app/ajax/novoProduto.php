<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once("../base.php");

$nomeProduto = htmlspecialchars($_POST["nomeProduto"]);
$precoProduto = htmlspecialchars($_POST["precoProduto"]);
$qtdEstoque = htmlspecialchars($_POST["qtdEstoque"]);

$produto->novoProduto($nomeProduto, $precoProduto, $qtdEstoque);