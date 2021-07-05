<?php

Class Conexao extends Config
{

    private $host, $usuario, $senha, $banco, $prefix;
    private $obj;//será utilizado para receber as queries

    function __construct()
    {

        $this->host = self::BD_HOST;
        $this->senha = self::BD_SENHA;
        $this->usuario = self::BD_USER;
        $this->banco = self::BD_BANCO;
        $this->prefix = self::BD_PREFIX;

        try {
            //verificando se a conexão já existe
            if($this->conectar() === NULL)
            {
                 $this->conectar();
            }
           
        } catch (Exception $e) {
            exit($e->getMessage().'<h2> Erro na conexão com o banco de dados</h2>');
        }

    }

    private function conectar()
    {
        //a variável opção serve para codificar os valores do banco para utf-8 caso o banco não esteja configurado
        //para isso
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ];
        
        $link = new PDO("mysql:host={$this->host};dbname={$this->banco}", $this->usuario, $this->senha, $options);

        return $link;
    }

    //metodo para executar as queries do banco
    function executeSQL($txtSQL, array $parametros = NULL)
    {
        //Se não for passado nenhum parâmetro significa que a querie é somente de busca
        //então será mostrado o resultado em formato de array
        if($parametros === NULL)
        {
             //armazenando em obj a preparacao da query
            $this->obj = $this->conectar()->prepare($txtSQL);
            //executando a query  no banco
            $this->obj->execute();

            return $this->obj->fetch(PDO::FETCH_ASSOC);
        }else
        {
             //armazenando em obj a preparacao da query
             $this->obj = $this->conectar()->prepare($txtSQL);
             //executando a query  no banco
             $this->obj->execute();
        }
       

    }





    
        
    
}

?>