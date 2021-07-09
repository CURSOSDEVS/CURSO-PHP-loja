<?php

    $smarty = new Template();


    $produto = new Produtos();


    //fazendo uma verificação para ver se a rota é de todos os produtos ou somente categorias de produtos
    //o parãmetro 0 é o controler, 1 é o id da categoria, 2 slug-do produto
    if(isset(Rotas::$pag[1])){
        $produto->getProdutosCateID(Rotas::$pag[1]);
        $smarty->assign('TITULO', Rotas::$pag[2]);
    }else{
        $produto->getProdutos();
        $smarty->assign('TITULO', 'Lista de produtos');
    }


    
   
    $smarty->assign('PRO', $produto->getItens());

    //Informacao do produto
    $smarty->assign('PRO_INFO', Rotas::get_ProdutosInfo());
    //informação do total de dados
    $smarty->assign('PRO_TOTAL', $produto->totalDados());

    //echo '<pre>';
    //var_dump($produto->getItens());
    //echo '</pre>';
    $smarty->display('produtos.tpl');
?>