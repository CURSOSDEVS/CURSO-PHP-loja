<?php

$smarty = new Template();
$carrinho = new Carrinho();

$smarty->assign('PRO', $carrinho->getCarrinho());
$smarty->assign('TOTAL', '100.00');

$smarty->display('carrinho.tpl');

echo '<pre>';
var_dump($carrinho->getCarrinho());
echo '</pre>';


?>