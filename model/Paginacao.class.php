<?php

class Paginacao extends Conexao
{
    function __construct()
    {
        parent::__construct();
    }

    public $limite, $inicio, $totalPags, $link = array(), $tolerancia, $mostrar;

    //metodo que irá receber o campo e a tabela que receberá a paginacao
    function getPaginacao($campo, $tabela)
    {
        $query = "SELECT {$campo} FROM {$tabela}";

        $this->executeSQL($query);

        //irá receber o total de itens encontrados
        $total = $this->totalDados();

        //vamos receber o limite da classe config
        $this->limite = Config::BD_LIMIT_POR_PAG;

        //paginas irá guardar o calculo de paginas que serão mostradas
        $paginas = ceil($total / $this->limite );

        $this->totalPags = $paginas;

        //verifica se está vindo via get o numero de paginas se não fornece 1 como número de paginas
        $p = (int)isset($_GET['p']) ? $_GET['p'] : 1;

        //setando a quantidaade de itens na pagina
        $this->inicio = ($p * $this->limite) - $this->limite;

        //irá percorrer a quantidade de páginas
        for($i = 1; $i <= $paginas; $i++)
        {
            //será adicionado ao array link o número da página
            array_push($this->link, $i);
        }
    }
}

?>