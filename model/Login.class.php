<?php

class Login extends Conexao
{
    private $usuario, $senha;

    function __construct()
    {
        parent:: __construct();
    }

    //vai receber o usuário e a senha
    function GetLogin($usuario, $senha)
    {
        $this->setUsuario($usuario);
        $this->setSenha($senha);

        $query = "SELECT * FROM {$this->prefix}clientes WHERE
        cli_email = :email AND cli_pass = :senha";
        $params = [ ':email' => $this->getUsuario(),
                    ':senha'=> $this->getSenha() ];

        $this->executeSQL($query, $params);
    }

    private function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    private function setSenha($senha)
    {
        $this->senha = $senha;
    }

}

?>