<?php

$id = (int)$_POST['pro_id'];
$carrinho = new Carrinho();
$carrinho->addCarrinho($id);

?>