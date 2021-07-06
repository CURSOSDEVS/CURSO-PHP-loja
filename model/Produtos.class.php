<?php

class Produtos extends Conexao
{
    function __construct()
    {
        //executando o construtor da classe mãe
        parent::__construct();

    }

    function getProdutos()
    {
        //seleciona todos os produtos de uma determinada categoria, criando um prefixo para cada tabela
        $txtSql = "SELECT * FROM {$this->prefix}produtos p INNER JOIN {$this->prefix}categorias c ON p.pro_categoria = c.cat_id";
        
        //$txtSql.= 'ORDER BY  prod_id DESC';

        $this->executeSQL($txtSql);

        $this->getLista();
        
    }

    //metodo privado pois será utilizado somente dentro da classe
    private function getLista()
    {
        $i = 1;
        while ($lista = $this->ListarDados()) 
        {
            $this->itens[$i] = [
                'pro_id'=>$lista['pro_id'],
                'pro_nome'=>$lista['pro_nome'],
                'pro_desc'=>$lista['pro_desc'],
                'pro_peso'=>$lista['pro_peso'],
                'pro_valor'=>$lista['pro_valor'],
                'pro_altura'=>$lista['pro_altura'],
                'pro_largura'=>$lista['pro_largura'],
                'pro_comprimento'=>$lista['pro_comprimento'],
                'pro_img'=>$lista['pro_img'],
                'pro_slug'=>$lista['pro_slug'],
                'pro_ref'=>$lista['pro_ref'],
                'cat_nome'=>$lista['cat_nome'],
                'cat_id'=>$lista['cat_id']
            ];
            $i++;
        }

    }
}

?>