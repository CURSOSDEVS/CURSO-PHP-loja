<?php   
/**Esta classe será utilizada para mudarmos
 * as configurações necessarias ao realizar
 * a alteração do servidor
 */
class Config
{
    /***INFORMAÇÕES BÁSICAS DO SITE**//
    //o local onde está o servidor
    const SITE_URL = "http://localhost";

     //Pasta onde está a aplicação
    const SITE_PASTA = "loja_virtual";

    //nome do site
    const SITE_NOME = "Loja do Freitas - PHP 7 e Mysqli";

    //email do administrador do site
    const SITE_EMAIL_ADM = "lojadofreitas@gmail.com";

    /*********************************/

    /**INFORMAÇÕES DO BANCO DE DADOS */
    const BD_HOST = "localhost",
          BD_USER = "root",
          BD_SENHA = "",
          BD_BANCO = "lojafreitas";

    /********************************** */

    /**INFORMAÇÕES DO PHP MAILER */
    const EMAIL_HOST = "smtp.gmail.com";
    
    /********************************/


}


?>