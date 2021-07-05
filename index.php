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

//Enviando o titulo do site
$smarty->assign('TITULO_SITE', Config::SITE_NOME);

//testando o banco de dados
$dados = new Conexao();
$sql = 'SELECT * FROM categorias';
$resultado = $dados->executeSQL($sql);

echo'<pre>';
var_dump($resultado);
echo'</pre>';
//

//metodo para abrir uma página .tpl 
$smarty->display('index.tpl');


?>