<?php
    $smarty = new Template();
    
    $produto = new Produtos();
    $produto->getProdutosID(Rotas::$pag[1]);
    
     //$smarty->assign('PRO', $produto->getItens());

 
     //Informacao do produto
    // $smarty->assign('PRO', Rotas::get_ProdutosInfo());
    echo '<pre>';
    var_dump($produto->getItens());
    echo '</pre>';
    $smarty->display('produtos_info.tpl');

?>