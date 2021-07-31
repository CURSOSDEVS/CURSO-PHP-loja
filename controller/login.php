<?php

$smarty = new Template();

$login = new Login();

if(isset($_POST['txt_email']) && isset($_POST['txt_senha']))
{
    $usuario = $_POST['txt_email'];
    $senha = $_POST['txt_senha'];

    $login->GetLogin($usuario  , $senha);
}



$smarty->display('login.tpl');


?>