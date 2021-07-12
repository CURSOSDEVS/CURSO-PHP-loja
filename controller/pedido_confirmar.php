<?php
//fazendo uma verificação para ver se existe uma sessão PRO
//se não existir sessão a página do carrinho não será carregada, será feito redicionamento
//para página dos produtos
if(isset($_SESSION['PRO']))
{
    $smarty = new Template();
    $carrinho = new Carrinho();

    $smarty->assign('PRO', $carrinho->getCarrinho());
    $smarty->assign('TOTAL', Ferramentas::formatarValorBR($carrinho->getTotalValor()));
    $smarty->assign('PAG_CARRINHO_ALTERAR', Rotas::pag_AlterarCarrinho());
    $smarty->assign('PAG_CARRINHO', Rotas::pag_Carrinho());
    $smarty->assign('PAG_FINALIZAR', Rotas::pag_Finalizar_Pedido());

    $smarty->display('pedido_confirmar.tpl');
}else
{
    //se não exisir será mostrado uma mensagem para o usuário e será redirecionado
    //para a página de produtos
    echo '<h4 class="alert alert-danger">Não existe produtos no carrinho.</h4>';
    rotas::redirecionar(2,Rotas::pag_Produtos());
}
//echo '<pre>';
//var_dump($carrinho->getCarrinho());
//echo '</pre>';


?>