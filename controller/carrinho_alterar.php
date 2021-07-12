<?php

//verificar o que está vindo pelo método post
if(!isset($_POST['pro_id']) or $_POST['pro_id'] < 1)
{
    echo '<h4 class="alert alert-danger">Erro no id do produto!</h4>';
    Rotas::Redirecionar(1, Rotas::pag_Carrinho());
    exit();
}
$id = (int)$_POST['pro_id'];

//echo '<h3>Id: '.$_POST['pro_id'].' - Ação: '.$_POST['acao'].'</h3>';
try {
    $carrinho = new Carrinho();
    $carrinho->addCarrinho($id);
} catch (Exception $e) {
    echo '<h4 class="alert alert-danger">Erro na operação de adicionar produto ao carrinho!</h4>';
}


//faz o redirecioamento para a pagina do carrinho com os produtos atualizados
Rotas::Redirecionar(1, Rotas::pag_Carrinho());


//echo '<pre>';
//var_dump($carrinho->getCarrinho());
//echo '</pre>';

//include_once "carrinho.php";

?>