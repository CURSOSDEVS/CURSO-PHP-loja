<?php

class Pedidos extends Conexao
{
    function __construct()
    {
        parent::__construct();
    }

    function PedidoGravar($cliente, $cod, $ref, $freteValor=null, $freteTipo=null)
    {

        $retorno = false;

        $txtSql = "INSERT INTO ".$this->prefix."pedidos ";
        $txtSql .= "(ped_data, ped_hora, ped_cliente, ped_cod,
            ped_ref, ped_frete_valor, ped_frete_tipo)";
        $txtSql .= " VALUES ";
        $txtSql .= "(:data, :hora, :cliente, :cod, :ref,
            :frete_valor, :frete_tipo)";

        $params = [':data'=>Ferramentas::DataAtualUS(),
                   ':hora'=> Ferramentas::HoraAtual(),
                   ':cliente'=> (int)$cliente,
                   ':cod'=>$cod,
                   ':ref'=>$ref,
                   ':frete_valor'=>$freteValor,
                   ':frete_tipo'=>$freteTipo];

        $this->executeSQL($txtSql, $params);

        echo $txtSql;

        //gravar os itens do pedido
        $this->ItensGravar($cod);

        $retorno = true;

        return $retorno;
    }

    function itensGravar($codPedido)
    {
        $carrinho = new Carrinho();
        foreach ($carrinho->getCarrinho() as $item) 
        {
            $txtSql = "INSERT INTO ".$this->prefix."pedidos_itens";
            $txtSql.= " (item_produto, item_valor, item_qtd, item_ped_cod)";
            $txtSql.= " VALUES";
            $txtSql.= " (:produto, :valor, :qtd, :cod)";

            $params = [':produto'=> $item['pro_id'],
                       ':valor'=>$item['pro_valor_us'],
                       ':qtd'=>(int)$item['pro_qtd'],
                       ':cod'=>$codPedido];
            
            $this->executeSQL($txtSql, $params);

            echo $txtSql;
        }
    }

    //funçao para limpar a sessão
    function LimparSessoes()
    {
        //LIMPA A SESSÃO DO CARRINHO
        unset($_SESSION['PRO']);
        //LIMPA A SESSÃO DO PEDIDO
        unset($_SESSION['pedido']);
        //LIMPA A REFERÊNCIA

    }
}

?>