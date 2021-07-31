<?php

$smarty = new Template();

$login = new Login();

if(isset($_POST['txt_email']) && isset($_POST['txt_senha']))
{
    $usuario = $_POST['txt_email'];
    $senha = $_POST['txt_senha'];

    $login->GetLogin($usuario  , $senha);
}

$smarty->assign('USER', '');
if(Login::Logado())
{
    $smarty->assign('USER', $_SESSION['CLI']['cli_nome']);
    $smarty->assign('PAG_LOGOUT', Rotas::pag_Logout() );
}

$smarty->assign('LOGADO', Login::Logado());

$smarty->display('login.tpl');


?>