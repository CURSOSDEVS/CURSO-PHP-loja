<?php

    $smarty = new Template();


    $produto = new Produtos();
    $produto->getProdutos();
   
    $smarty->assign('PRO', $produto->getItens());

    //Informacao do produto
    $smarty->assign('PRO_INFO', Rotas::get_ProdutosInfo());

    //echo '<pre>';
    //var_dump($produto->getItens());
    //echo '</pre>';
    $smarty->display('produtos.tpl');
?>