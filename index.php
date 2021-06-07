<?php

//com a indicação  ao autoload da pasta lib
//as referências são automaticamente carregadas
require "./lib/autoload.php";

$smarty = new Template();

//variáveis que serão lançadas para o a página do template
$smarty->assign('NOME', 'CLAUDISNEI BELLO');

//metodo para abrir uma página .tpl 
$smarty->display('index.tpl');




?>