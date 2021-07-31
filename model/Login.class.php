<?php

class Login extends Conexao
{
    private $usuario, $senha;

    function __construct()
    {
        parent:: __construct();
    }

    //vai receber o usuário e a senha
    function GetLogin($usuario, $senha)
    {
        $this->setUsuario($usuario);
        $this->setSenha($senha);

        $query = "SELECT * FROM {$this->prefix}clientes WHERE
        cli_email = :email AND cli_pass = :senha";
        $params = [ ':email' => $this->getUsuario(),
                    ':senha'=> $this->getSenha() ];

        $this->executeSQL($query, $params);

        //verifica se foi recuperado algum usuário
        if($this->totalDados() > 0)
        {   
            //carrega os dados do usuário na variavel lista
            $lista = $this->listarDados();

            //criamos uma nova sessão com os dados do cliente
            //para recuperar essas informaçoes posteriormente
            $_SESSION['CLI']['cli_id'] = $lista['cli_id'];
            $_SESSION['CLI']['cli_nome'] = $lista['cli_nome'];
            $_SESSION['CLI']['cli_sobrenome'] = $lista['cli_sobrenome'];
            $_SESSION['CLI']['cli_endereco'] = $lista['cli_endereco'];
            $_SESSION['CLI']['cli_numero'] = $lista['cli_numero'];
            $_SESSION['CLI']['cli_bairro'] = $lista['cli_bairro'];
            $_SESSION['CLI']['cli_cidade'] = $lista['cli_cidade'];
            $_SESSION['CLI']['cli_uf'] = $lista['cli_uf'];
            $_SESSION['CLI']['cli_cep'] = $lista['cli_cep'];
            $_SESSION['CLI']['cli_cpf'] = $lista['cli_cpf'];
            $_SESSION['CLI']['cli_rg'] = $lista['cli_rg'];
            $_SESSION['CLI']['cli_ddd'] = $lista['cli_id'];
            $_SESSION['CLI']['cli_fone'] = $lista['cli_fone'];
            $_SESSION['CLI']['cli_celular'] = $lista['cli_id'];
            $_SESSION['CLI']['cli_email'] = $lista['cli_email'];
            $_SESSION['CLI']['cli_pass'] = $lista['cli_pass'];
            $_SESSION['CLI']['cli_data_nasc'] = $lista['cli_data_nasc'];
            $_SESSION['CLI']['cli_data_cad'] = $lista['cli_data_cad'];
            $_SESSION['CLI']['cli_hora_cad'] = $lista['cli_hora_cad']; 
            
        }
    }

    private function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    private function setSenha($senha)
    {
        $this->senha =  $senha;
    }

    function getUsuario()
    {
        return $this->usuario;
    }

    function getSenha()
    {
        return $this->senha;
    }

    //funcao para verificar se existe sessão de cliente ativa
    static function Logado()
    {
        //se existe um email válido e um id
        if(isset($_SESSION['CLI']['cli_email']) && isset($_SESSION['CLI']['cli_id']) )
        {
            return true;
        }else
        {
            return false;
        }
    }

    //função para logout
    static function logout()
    {
        unset($_SESSION['CLI']);
        echo '<h4 class="alert alert-success">Saindo....</h4>';
        Rotas::redirecionar(2,Rotas::get_SiteHome());
    }

}

?>