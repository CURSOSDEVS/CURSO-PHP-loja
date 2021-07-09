<?php
    $smarty = new Template();

    $produto = new Produtos();
    $produto->getProdutosID(Rotas::$pag[1]);
    
    $smarty->assign('PRO', $produto->getItens());
    $smarty->assign('TEMA', Rotas::get_SiteTema());

    $smarty->display('produtos_info.tpl');

    //echo '<pre>';
    //var_dump($produto);
  //  echo '</pre>';

?>