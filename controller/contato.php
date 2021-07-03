<?php

$smarty = new Template();

//$smarty->assign('CONTATO', 'Página de Contatos');

$smarty->assign('GET_TEMA', Rotas::get_SiteTema());

$smarty->display('contato.tpl');





?>