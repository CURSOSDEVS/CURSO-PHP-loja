<?php

$to      = Config::EMAIL_USER ;
$subject = 'Contato - Loja Virtual Legal';
$message = 'Email de: ' . $_GET['txtinputnome']. "\r\n" . $_GET['txtinpuarea'];

$headers = "From: ".$_GET['txtinputemail'];

mail($to, $subject, $message, $headers);
?>
//script em javasc para enviar alerta na página
<script>alert('Email enviado com sucesso!')</script>
//recarregando a página de contato
<meta http-equiv="refresh" content="0; url=>contato">