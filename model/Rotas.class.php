<?php

/**Classe Rotas terá a finalidade de definir as rotas que serão
 * utilizadas para acessar as páginas que farão parte da loja
 */

  class Rotas 
 {
     //variável  pag que será utilizada 
     public static $pag;

     //variável statica que será utilizada para carregamento dos templates
     private static $pasta_controller = 'controller';
     private static $pasta_view = 'view';

     //variavel statica utilizada para carregar o caminho das imagens dos produtos
     private static $pasta_imagens = 'media/images';

     /**************************************** */
     //método estático para obter o caminho principal do site
     static function get_SiteHome()
     {
        return Config::SITE_URL .'/'. Config::SITE_PASTA;
     }

     /**************************************** */
     //método para obter a raiz do site, utilizando a 
     //função $_SERVER com DOCUMENT_ROOT que captura todo o endereço 
     //do site
     static function get_SiteRaiz()
     {
         return $_SERVER['DOCUMENT_ROOT'] . '/' . Config::SITE_PASTA;
     }

     /****************************************** */
     //método para carregar o caminho onde ficarão os templates
     static function get_SiteTema()
     {
        return self::get_SiteHome() . '/' . self::$pasta_view;
     }

     /***************************************** */
     //metodo que carregará a página do carrinho
     static function pag_Carrinho()
     {
        return self::get_SiteHome(). '/carrinho';
     }

     /***************************************** */
     //metodo que carregará a página do carrinho
     static function pag_AlterarCarrinho()
     {
        return self::get_SiteHome(). '/carrinho_alterar';
     }

     /***************************************** */
     
     /***************************************** */
     //metodo que carregará a página do contato
     static function pag_Contato()
     {
        return self::get_SiteHome(). '/contato';
     }

     /*********************************************/

     //metodo que carregará a página minha conta
     static function pag_MinhaConta()
     {
        return self::get_SiteHome(). '/minhaconta';
     }

     /*********************************************/
     //metodo que carregará a página de produtos
     static function pag_Produtos()
     {
        return self::get_SiteHome(). '/produtos';
     }

     /*********************************************/

     //metodos para carregar a pasta de imagens
     static function get_pasta_imagens()
     {
        return self::$pasta_imagens;
     }

     //metodo para carregar toda a url da imagem
     static function get_URL_imagens()
     {
        return self::get_SiteHome() . '/' . self::get_pasta_imagens();
     }

     /*metodo que irá carregar o link da imagem, tendo com parâmetros o nome, largura, altura da imagen 
     será utilizado o arquivo thumb.php que irá redimensionar as imagens*/
     static function get_linkImagem($nome, $largura, $altura)
     {
        $imagem = self::get_URL_imagens().'/'."thumb.php?src={$nome}&w={$largura}&h={$altura}&zc=1";
        return $imagem;
     }

     /************************************************/
     //rota para a página de informação de produto
     static function get_ProdutosInfo()
     {
        return self::get_SiteHome().'/produtos_info';
     }

     /************************************************/
     //metodo para carregar todas as categorias na página principal
     static function get_Categorias()
     {
        $categorias = new Categorias();

        $categorias->getCategorias();

        return $categorias->getItens();
     }

     /************************************************* */

     static function get_Pasta_Controller()
     {
         return self::$pasta_controller;
     }
     
      /************************************************* */
      //metodo para redirecionar a uma página específica 
     static function redirecionar($tempo, $pagina)
     {
        $url = '<meta http-equiv="refresh" content="'.$tempo.'; url='.$pagina.'">';
        echo $url;
     }

     /************************************************* */
     //metodo para confirmar o pedido
     static function pag_pedido_confirmar()
     {
        return self::get_SiteHome().'/pedido_confirmar';
     }

     /************************************************* */
     //metodo para finalizar o pedido
     static function pag_Finalizar_Pedido()
     {
        return self::get_SiteHome().'/pedido_finalizar';
     }

     /************************************************* */
     /**metodo estático para capturar a página */
     static function get_pagina()
     {
        /**vamos testar primeiro se uma página foi 
         * lançada via Get por paginas ou Post por
         * formulários
         */
        //pag será a variável que conterá o nome da página
        if(isset($_GET['pag']))
        {   
            //é o que como parâmetro na url da página
            $pagina = $_GET['pag'];

            //vai tratar a string, todo o local que tiver /
            //criando um array da página digitada na url
            //será capturado. self:: carrega a variável da classe atual
            self::$pag = explode('/', $pagina);
            
            /**codigo para verificar a criação do array com os
             * itens das páginas que estao separadas por /
             * ex: loja_virtual/carrinho/teste, vai retornar um array
             * com dois componentes, o carrinho e teste. Quando
             * tiver o id do produto o mesmo será incluido no array  
             */
            
            /*echo '<pre>';
            var_dump(self::$pag);
            echo '</pre>';*/

            //formando o nome do arquivo que será utilizada para
            //acessar a página enviada via get, junto com o endereço
            //onde o controler está
            //$pagina = 'controller/' .$_GET['pag']. '.php';

            //utilizando agora a variável $pag que já possui a indicação
            //da página que será utilizada para abrir a página, lembrando
            //que $pag é um array
            $pagina = 'controller/' .self::$pag[0]. '.php';

            //vamos testar para ver se o arquivo existe                   
            if(file_exists($pagina))
            {
                //se a página ixistir ela será incluida na index
                include $pagina;
            }else
            {
                 //se não existir será incluida a página de erro na index
                include 'erro.php';
            }
        }else
        {
           include 'home.php';
        }
     }
 }
?>