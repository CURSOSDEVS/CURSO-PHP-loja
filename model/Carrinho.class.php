<?php   

/**Está classe fará por exemplo consulta no banco de dados
 * para verificar se ha pedidos dentro do carrinho ou não
 * fazendo os cálculos necessário * 
 */

class Carrinho
{
    private $total_valor, $total_peso, $itens = array(), $qtd_prod;

    //para obter um carrinho a sessão tem que ser nula
    function getCarrinho($sessao=NULL)
    {
        //criar a sessão
        $i = 1;
        $sub = 0.00;
        $peso = 0.00;

        foreach ($_SESSION['PRO'] as $lista) { 

            $sub = ($lista['VALOR_US'] * $lista['QTD']);  
            $this->total_valor += $sub;

            $this->itens[$i] = [
                'pro_id'=>$lista['ID'],                
                'pro_nome'=>$lista['NOME'],                  
                'pro_valor'=>$lista['VALOR'],
                'pro_valor_us'=>$lista['VALOR_US'],
                'pro_peso'=>$lista['PESO'],
                'pro_qtd'=>$lista['QTD'],
                //utilizando metodo para carregar o endereco e redimensionar as fotos
                'pro_img'=> $lista['IMG'],
                'pro_link'=> $lista['LINK'],
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

        ///criando uma lista para incrementar o carrinho
      
        foreach ($produto->getItens() as $pro ) {
            $ID = $pro['pro_id'];
            $NOME = $pro['pro_nome'];
            $VALOR_US = $pro['pro_valor_us'];
            $VALOR = $pro['pro_valor'];
            $PESO = $pro['pro_peso'];
            $QTD = 1;
            $IMG = $pro['pro_img'];
            $LINK = Rotas::get_ProdutosInfo().'/'.$pro['pro_id'].'/'.$pro['pro_slug'];
            $ACAO = $_POST['acao'];
        }

        /*
        $_SESSION['PRO'][$id]['id']= $pro['pro_id'];
        $_SESSION['PRO'][$id]['nome']= $pro['pro_nome'];
        $_SESSION['PRO'][$id]['valor']= $pro['pro_valor'];
        $_SESSION['PRO'][$id]['valor_us']= $pro['pro_valor_us'];
        $_SESSION['PRO'][$id]['peso']= $pro['pro_peso'];
        $_SESSION['PRO'][$id]['qtd']= 1;
        $_SESSION['PRO'][$id]['img']= $pro['pro_img'];
        $_SESSION['PRO'][$id]['link']= 'sssslink';
        $id++; */

       // echo '<pre>';
       // var_dump($produto->get)

        //
        switch ($ACAO) {
            case 'add':
                //quando o usuário clicar no botão comprar na página produto-info
                //os dados do produto serão passados para a sessão atual e se não existir o id no carrinho o produto será 
                //adicionado ao carrinho
                
                if(!isset($_SESSION['PRO'][$ID]['ID']))
                {
                    $_SESSION['PRO'][$ID]['ID'] = $ID;
                    $_SESSION['PRO'][$ID]['NOME'] = $NOME;
                    $_SESSION['PRO'][$ID]['VALOR'] = $VALOR;
                    $_SESSION['PRO'][$ID]['VALOR_US'] = $VALOR_US;
                    $_SESSION['PRO'][$ID]['PESO'] = $PESO;
                    $_SESSION['PRO'][$ID]['QTD'] = $QTD;
                    $_SESSION['PRO'][$ID]['IMG'] = $IMG;
                    $_SESSION['PRO'][$ID]['LINK'] = $LINK;                    
                }else
                {
                    //se o produto existe então deve ser acrescentado uma unidade ao produto no carrinho                   
                    $_SESSION['PRO'][$ID]['QTD'] += $QTD ;
                    
                }
                echo '<h4 class="alert alert-success"> Produto Inserido.</h4>';                
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