<?php

//verificamos se não existir uma sessão então será criada uma nova
if(!isset($_SESSION))
{
    session_start();
}

if(!isset($_SESSION['pedido']))
{
    $_SESSION['pedido']=md5(uniqid(date('YmdHms')));
}

//com a indicação  ao autoload da pasta lib
//as referências são automaticamente carregadas
require "./lib/autoload.php";

$smarty = new Template();

//toda vez que for utilizado no template a variavel GET_TEMA
//como referência para algum arquivo, será lançado o valor
//de Rotas::get_SiteTema()
$smarty->assign('GET_TEMA', Rotas::get_SiteTema());

//rota do home da página principal
//$smarty->assign('GET_HOME', Rotas::get_SiteHome());

//rota do home da página principal
$smarty->assign('GET_NOME', Config::SITE_NOME);

//rota do site da página principal
$smarty->assign('GET_SITE_HOME', Rotas::get_SiteHome());

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

//Enviando a data atual para o template
$smarty->assign('DATA_ATUAL', Ferramentas::dataAtualBR());

//vai para a página de logout
$smarty->assign('PAG_LOGOUT', Rotas::pag_Logout() );

//envia a situação do usuário logado ou não
$smarty->assign('LOGADO', Login::Logado());

//se o cliente estiver logado irá recuperar o nome do cliente
if(Login::Logado())
{
    $smarty->assign('USER', $_SESSION['CLI']['cli_nome']);
   
}

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