<?php
    $smarty = new Template();

    $produto = new Produtos();
    $produto->getProdutosID(Rotas::$pag[1]);
    
    $smarty->assign('PRO', $produto->getItens());
    $smarty->assign('TEMA', Rotas::get_SiteTema());

    //criando instancia para carregar as fotos do produto
    $fotosProduto = new ProdutosImages();

    //pegando o id do produto informado na rota
    $fotosProduto->getImagesPro(Rotas::$pag[1]);

    //enviando  o array para o template
    $smarty->assign('Fotos', $fotosProduto->getItens() );

    $smarty->display('produtos_info.tpl');

    //echo '<pre>';
    //var_dump($fotosProduto);
    //echo '</pre>';

?>