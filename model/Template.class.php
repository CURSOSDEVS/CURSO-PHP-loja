<?php
/**Classe para configurar as propriedades dos templates
 * que extende da smartyBC
 */
class Template extends Smarty
{
    function __construct()
    {
        //quando ela for chamada ela carregará todasas propriedades
        //da classe mãe
        parent:: __construct();

        /**propriedades que deveriam ser ajustadas em todas as instâncias
         * do smarty, porém agora será carregada automaticamente
         * ao instanciar a classe
         */
    
        //fornecendo a referência do local onde está a página do template
        $this->setTemplateDir('view/');

        //setando o local onde será carregado o compilador
        $this->setCompileDir('view/compile/');

        //setando o local das páginas de cache
        $this->setCacheDir('view/cache/');

    }
}

?>