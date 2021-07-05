<?php

Class Conexao extends Config
{

    private $host, $usuario, $senha, $banco, $prefix;

    function __construct()
    {
        self::$host = self::BD_HOST;
        self::$senha = self::BD_SENHA;
        self::$usuario = self::BD_USER;
        self::$banco = self::BD_BANCO;
        self::$prefix = self::BD_PREFIX;
    }

    private function conectar()
    {
        //a variável opção serve para codificar os valores do banco para utf-8 caso o banco não esteja configurado
        //para isso
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf-8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ];
        $link = new PDO("mysql:host={$this->host};dbname={$this->banco}",self::$usuario, self::$senha, $options);
    }



    
        
    
}

?>