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

    //testando se a sessão está capturando os dados, pegando o id do produto da url 
    /* $id = Rotas::$pag[1];
    foreach ($produto->getItens() as $pro) 
    {
        $_SESSION['PRO'][$id]['id']= $pro['pro_id'];
        $_SESSION['PRO'][$id]['nome']= $pro['pro_nome'];
        $_SESSION['PRO'][$id]['valor']= $pro['pro_valor'];
        $_SESSION['PRO'][$id]['valor_us']= $pro['pro_valor_us'];
        $_SESSION['PRO'][$id]['peso']= $pro['pro_peso'];
        $_SESSION['PRO'][$id]['qtd']= 1;
        $_SESSION['PRO'][$id]['img']= $pro['pro_img'];
        $_SESSION['PRO'][$id]['link']= 'sssslink';
        $id++;
    }*/
    
    //enviando comando para o botão comprar
    $smarty->assign('PAG_COMPRAR', Rotas::pag_AlterarCarrinho());

    $smarty->display('produtos_info.tpl');

    //echo '<pre>';
    //var_dump($fotosProduto);
    //echo '</pre>';

?>