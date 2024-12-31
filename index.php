<?php

require_once './vendor/autoload.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

use app\model\Produto;
use app\model\ProdutoDao;

/*$produto = new Produto();
$produto->setId(1);
$produto->setNome("Microfone AT2020 Editado");
$produto->setDescricao("Microfone Condensador");*/

$produtoDao = new ProdutoDao();
//$produtoDao->cadastrar($produto);
//$produtoDao->atualizar($produto);
$produtoDao->excluir(10);
$produtoDao->listar();

foreach ($produtoDao->listar() as $produto) {
    echo "- Produto: " . $produto["nome"] . " - ";
    echo $produto["descricao"] . "<br>";
}