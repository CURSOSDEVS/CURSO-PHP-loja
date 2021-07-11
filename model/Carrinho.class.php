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

}

?>