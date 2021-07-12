<?php

$id = (int)$_POST['pro_id'];

echo '<h3>Id: '.$_POST['pro_id'].' - Ação: '.$_POST['acao'].'</h3>';

$carrinho = new Carrinho();
$carrinho->addCarrinho($id);

echo '<pre>';
var_dump($carrinho->getCarrinho());
echo '</pre>';

//include_once "carrinho.php";

?>