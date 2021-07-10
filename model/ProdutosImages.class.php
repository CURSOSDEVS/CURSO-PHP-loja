<?php
    class ProdutosImages extends Conexao
    {
        public function __construct()
        {
            parent:: __construct();
        }

        function getImagesPro($idPro)
        {
            $query = "SELECT * FROM {$this->prefix}images WHERE img_pro_id = :idPro";
            $params = array(
                    ':idPro'=>(int)$idPro
            );

            $this->executeSQL($query, $params);

            $this->getLista();
        }

        private function getLista()
        {
            $i = 1;
            while($lista = $this->listarDados())
            {
                $this->itens[$i] = [
                    'img_id'=>$lista['img_id'],
                    'img_nome'=>Rotas::get_linkImagem($lista['img_nome'],150,150),
                    'img_pro_id'=>$lista['img_pro_id'],
                    'img_link'=>Rotas::get_linkImagem($lista['img_nome'],500,500),
                    'img_arquivo'=>$lista['img_nome']
                ];
                $i++;
            };
        }
    }
?>