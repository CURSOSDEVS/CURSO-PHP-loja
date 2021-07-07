<?php

    $smarty = new Template();


    $produto = new Produtos();
    $produto->getProdutos();
   // echo '<pre>';
   // var_dump($produto->getItens());
   // echo '</pre>';
    $smarty->assign('PROD', $produto->getItens());
    $smarty->display('produtos.tpl');
?>