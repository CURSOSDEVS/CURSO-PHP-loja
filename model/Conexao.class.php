<?php

Class Conexao extends Config
{

    private $host, $usuario, $senha, $banco;
    protected $obj, $itens= [], $prefix; //será utilizado para receber as queries

    //variavel de paginacao que irá criar o link da paginacao
    public $paginacao_links, $totalPaginas, $limite, $inicio;
    
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
           
        }catch (Exception $e){
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
    function executeSQL($txtSQL, array $params = NULL)
    {    
        //armazenando em obj a preparacao da query
        $this->obj = $this->conectar()->prepare($txtSQL);
        //verificando os parâmetros passados na url
        if(isset($params))
        {
            if(count($params) > 0)
            {
                foreach ($params as $key => $value) {
                    //guarda a informação do parâmetro
                    $this->obj->bindValue($key, $value);
                }
            }
        }
        //executando a query  no banco
        return $this->obj->execute();
    }

    //Metodo para listar os dados
    function listarDados ()
    {
        return $this->obj->fetch(PDO::FETCH_ASSOC);
    }

    //metodo para verificar se a consulta ou tabela retornou algum valor
    function totalDados()
    {
        return $this->obj->rowCount();
    }

    //metodo para obter os itens, pode ser dados vindo de um array
    function getItens()
    {
        return $this->itens;
    }
      
    //metodo para criar o limite da query que será utilizado na query da classe 
    function getPaginacaoLinks($campo, $tabela)
    {
        $pag = new Paginacao();
        $pag->getPaginacao($campo, $tabela);

        //passa o array criado na classe Paginacao
        $this->paginacao_links = $pag->link;

        //passando valores para as outras variaveis
        $this->totalPaginas = $pag->totalPags;
        $this->limite = $pag->limite;
        $this->inicio = $pag->inicio;

        if($this->totalPaginas > 0)
        {
            //retornará o limite que será utilizado no txtSql
            return "LIMIT {$this->inicio}, {$this->limite}";
        }else
        {
            return "";
        }
    }

    //metodo para criar os botoes na página que irá receber o numero de paginas calculado na classe Paginacao
    protected function getBotoesPaginacao($paginas = array())
    {
        $pag = '<ul class="pagination">';
        $pag .= '<li><a href="?p=1"> << Início</a></li>';

        foreach ($paginas as $p) {
            $pag .= '<li><a href="?p='.$p.'">'.$p.'</a></li>';
        }

        $pag .= '</ul>';

        return $pag;
    }

    //metodo para executar a criacao de botoes
    function showBotoesPaginacao()
    {
        return $this->getBotoesPaginacao($this->paginacao_links);
    }

}

?>