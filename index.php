<?php

//com a indicação  ao autoload da pasta lib
//as referências são automaticamente carregadas
require "./lib/autoload.php";

$smarty = new Template();

//toda vez que for utilizado no template a variavel GET_TEMA
//como referência para algum arquivo, será lançado o valor
//de Rotas::get_SiteTema()
$smarty->assign('GET_TEMA', Rotas::get_SiteTema());

//metodo para abrir uma página .tpl 
$smarty->display('index.tpl');


?>