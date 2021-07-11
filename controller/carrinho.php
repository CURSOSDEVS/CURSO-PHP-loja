<?php

$smarty = new Template();
$carrinho = new Carrinho();

$smarty->assign('PRO', $carrinho->getCarrinho());
$smarty->assign('TOTAL', Ferramentas::formatarValorBR($carrinho->getTotalValor()));

$smarty->display('carrinho.tpl');

//echo '<pre>';
//var_dump($carrinho->getCarrinho());
//echo '</pre>';


?>