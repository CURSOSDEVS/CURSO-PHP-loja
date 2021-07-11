<?php   

/**Está classe fará por exemplo consulta no banco de dados
 * para verificar se ha pedidos dentro do carrinho ou não
 * fazendo os cálculos necessário * 
 */

class Carrinho
{
    private $total_valor, $total_peso, $itens = array();

    //para obter um carrinho a sessão tem que ser nula
    function getCarrinho($sessao=NULL)
    {
        //criar a sessão
        $i = 1;
        $sub = 0.00;
        $peso = 0.00;

        foreach ($_SESSION['PRO'] as $lista) { 

            $sub = ($lista['valor_us'] * $lista['qtd']);  
            $this->total_valor += $sub;

            $this->itens[$i] = [
                'pro_id'=>$lista['id'],                
                'pro_nome'=>$lista['nome'],                  
                'pro_valor'=>$lista['valor'],
                'pro_valor_us'=>$lista['valor_us'],
                'pro_peso'=>$lista['peso'],
                'pro_qtd'=>$lista['qtd'],
                //utilizando metodo para carregar o endereco e redimensionar as fotos
                'pro_img'=> $lista['img'],
                'pro_link'=> $lista['link'],
                'pro_subTotal'=> Ferramentas::formatarValorBR($sub),
                'pro_subTotal_us'=>$sub  
            ];
            $i++;
        };

        //se a quantidade de itens for maior de 0 significa que existe
        if(count($this->itens) > 0)
        {
            return $this->itens;
        }else
        {
            return '<h4 class="alert alert-danger">Não há produtos no carrinho!</h4>';
        }
    }

    //retornar o total do carrinho
    function getTotalValor()
    {
        return $this->total_valor;
    }

    function getTotalPeso()
    {
        return $this->total_peso;
    }

    //incrementando itens dentro do carrinho
    function addCarrinho($id)
    {
        $produto = new Produtos();
        $produto->getProdutosID($id);

        $acao = NULL;

        //criando uma lista para incrementar o carrinho
        foreach ($produto->getItens() as $pro ) {
            $idPro = $pro['pro_id'];
            $nomePro = $pro['pro_nome'];
            $valor_us_Pro = $pro['pro_valor_us'];
            $valorPro = $pro['pro_valor'];
            $pesoPro = $pro['pro_peso'];
            $qtdPro = 1;
            $imgPro = $pro['pro_img'];
            $linkPro = Rotas::get_ProdutosInfo().'/'.$idPro.'/'.$pro['pro_slug'];
            $acaoPro = $_POST['acao'];
        }

        //
        switch ($acao) {
            case 'add':
                //se não existir o id no carrinho
                if(!isset($_SESSION['PRO'][$idPro]['pro_id']))
                {
                    $_SESSION['PRO'][$idPro]['pro_id'] = $idPro;
                    $_SESSION['PRO'][$idPro]['pro_nome'] = $nomePro;
                    $_SESSION['PRO'][$idPro]['pro_valor_us'] = $valor_us_Pro;
                    $_SESSION['PRO'][$idPro]['pro_valor'] = $valorPro;
                    $_SESSION['PRO'][$idPro]['pro_peso'] = $pesoPro;
                    $_SESSION['PRO'][$idPro]['qtdPro'] = $qtdPro;
                    $_SESSION['PRO'][$idPro]['pro_img'] = $imgPro;
                    $_SESSION['PRO'][$idPro]['linkPro'] = $linkPro;
                    $_SESSION['PRO'][$idPro]['pro_nome'] = $nomePro;
                }else
                {

                }
                break;
            case 'del':
                # code...
                break;
            case 'limpar':
                # code...
                break;
        }
    }


}

?>