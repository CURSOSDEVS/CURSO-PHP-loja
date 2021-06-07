<?php

/**Classe Rotas terá a finalidade de definir as rotas que serão
 * utilizadas para acessar as páginas que farão parte da loja
 */

 class Rotas 
 {
     //variável  pag que será utilizada 
     public static $pag;

     //método estático para obter a url principal do site
     static function get_SiteHome()
     {
        return Config::SITE_URL .'/'. Config::SITE_PASTA;
     }

     //método para obter a raiz do site, utilizando a 
     //função $_SERVER com DOCUMENT_ROOT que captura onde o site está hospedado
     //
     static function get_SiteRaiz()
     {
         return $_SERVER['DOCUMENT_ROOT'] . "/" . Config::SITE_PASTA;
     }

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
        }
     }
 }
?>