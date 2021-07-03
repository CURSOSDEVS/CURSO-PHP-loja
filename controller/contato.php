<?php

$smarty = new Template();

$smarty->assign('GET_TEMA', Rotas::get_SiteTema());

$smarty->display('contato.tpl');





?>