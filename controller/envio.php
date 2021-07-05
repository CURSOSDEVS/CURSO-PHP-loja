<?php

$to      = Config::EMAIL_USER ;
$subject = 'Contato - Loja Virtual Legal';
$message = 'Email de: ' . $_GET['txtinputnome']. "\r\n" . $_GET['txtinpuarea'];

$headers = "From: ".$_GET['txtinputemail'];

mail($to, $subject, $message, $headers);
?>