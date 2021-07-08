<?php

//com a indicação  ao autoload da pasta lib
//as referências são automaticamente carregadas
require "./lib/autoload.php";

$smarty = new Template();

//toda vez que for utilizado no template a variavel GET_TEMA
//como referência para algum arquivo, será lançado o valor
//de Rotas::get_SiteTema()
$smarty->assign('GET_TEMA', Rotas::get_SiteTema());

//rota do home da página principal
$smarty->assign('GET_HOME', Rotas::get_SiteHome());

//rota do carrinho
$smarty->assign('PAG_CARRINHO', Rotas::pag_Carrinho());

//rota do contato
$smarty->assign('PAG_CONTATO', Rotas::pag_Contato());

//rota da minhaconta
$smarty->assign('PAG_MINHACONTA', Rotas::pag_MinhaConta());

//ROTA PARA PRODUTOS
$smarty->assign('PAG_PRODUTOS', Rotas::pag_Produtos());

//Enviando o titulo do site
$smarty->assign('TITULO_SITE', Config::SITE_NOME);

//Enviando as categorias
$smarty->assign('GET_CATEGORIAS', Rotas::get_Categorias() );

//testando o banco de dados
//$dados = new Conexao();
//$sql = 'SELECT * FROM categorias';
//$resultado = $dados->executeSQL($sql);
//$total = $dados->totalDados();

//echo'<pre>';
//var_dump(Rotas::get_Categorias());
//echo'</pre>';

//rota da página de produtos
$smarty->assign('PAG_PRODUTOS', Rotas::pag_Produtos());

//metodo para abrir uma página .tpl 
$smarty->display('index.tpl');


?>