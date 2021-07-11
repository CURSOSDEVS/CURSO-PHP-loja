<?php

$smarty = new Template();
$carrinho = new Carrinho();

$smarty->assign('SESSAO_PRO', $carrinho->getCarrinho());

$smarty->display('carrinho.tpl');

?>