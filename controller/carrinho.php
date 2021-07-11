<?php

$smarty = new Template();
$carrinho = new Carrinho();

$smarty->assign('PRO', $carrinho->getCarrinho());

//echo '<pre>';
//var_dump($carrinho->getCarrinho());
//echo '</pre>';
$smarty->display('carrinho.tpl');

?>