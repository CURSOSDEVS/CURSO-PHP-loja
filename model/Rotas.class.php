<?php

/**Classe Rotas terá a finalidade de definir as rotas que serão
 * utilizadas para acessar as páginas que farão parte da loja
 */

 class Rotas 
 {
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
            
            //formando o nome do arquivo que será utilizada para
            //acessar a página enviada via get, junto com o endereço
            //onde o controler está
            $pagina = 'controller/'.$_GET['pag'].'.php';

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