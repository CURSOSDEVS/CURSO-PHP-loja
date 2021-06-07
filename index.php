<?php

//com a indicação  ao autoload da pasta lib
//as referências são automaticamente carregadas
require "./lib/autoload.php";

$smarty = new Smarty();

//fornecendo a referência do local onde está a página do template
$smarty->setTemplateDir('view/');

//setando o local onde será carregado o compilador
$smarty->setCompileDir('view/compile/');

//setando o local das páginas de cache
$smarty->setCacheDir('view/cache/');

//variáveis que serão lançadas para o a página do template
$smarty->assign('NOME', 'CLAUDISNEI BELLO');

//metodo para abrir uma página .tpl 
$smarty->display('index.tpl');




?>