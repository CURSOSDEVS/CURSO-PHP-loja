<?php

    $smarty = new Template();


    $produto = new Produtos();
    $produto->getProdutos();
   
    $smarty->assign('PROD', $produto->getItens());
     echo '<pre>';
    //var_dump($produto->getItens());
    echo '</pre>';
    $smarty->display('produtos.tpl');
?>