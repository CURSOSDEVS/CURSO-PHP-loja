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
                    'img_nome'=>$lista['img_nome'],
                    'img_pro_id'=>$lista['img_pro_id'],
                    'img_pasta'=>$lista['img_pasta']
                ];
            };
        }
    }
?>