<?php
    Class Categorias extends Conexao
    {
        private $cat_id, $cat_nome, $cat_slug;

        public function __construct()
        {
            parent:: __construct();
        }

        function getCategorias()
        {
            $txtSQL = "SELECT * FROM {$this->prefix}categorias";

            $txtSQL .= " ORDER BY cat_nome";

            $this->executeSQL($txtSQL);

            $this->getLista();
        }


        function getLista()
        {
            $i=1;
            while ($lista = $this->listarDados()) {
                $this->itens[$i] = array(
                    'cat_nome'=>$lista['cat_nome'],
                    'cat_id'=>$lista['cat_id'],
                    'cat_slug'=>$lista['cat_slug'],
                    'cat_link'=>Rotas::pag_Produtos() . '/' . $lista['cat_id'] . '/' . $lista['cat_slug'],
                );
                $i++;
            };


        }
    }
?>