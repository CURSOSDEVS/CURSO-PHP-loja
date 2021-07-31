
{if $LOGADO==true}
    <h4 class="text-center text-danger"> Olá <b>{$USER}</b>, seja bem vindo! O que deseja fazer agora?</h4> 
    <section class="row">
    
    <div class="text-center">
        
        <a href="{$PAG_CONTA}" class="btn btn-success"><i class="glyphicon glyphicon-home"></i> Minha Conta</a>
        
        <a href="{$PAG_CLIENTE_PEDIDOS}" class="btn btn-success"><i class="glyphicon glyphicon-barcode"></i> Pedidos</a>
        
        <a href="{$PAG_CLIENTE_DADOS}" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Meus Dados </a>
        <a href="{$PAG_CARRINHO}" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Carrinho </a>
        <a href="{$PAG_CLIENTE_SENHA}" class="btn btn-warning"> Alterar Senha </a>
        <a href="{$PAG_LOGOUT}" class="btn btn-danger"><i class="glyphicon glyphicon-log-out"></i> Sair </a>
     
        
        
        
    </div>
      
    </section>
{else}
<section class="row" id="fazerlogin">

    <form name="cliente_login" method="post" action="" >
    
        <div class="col-md-4 text-center">
        
    
           <p>{$USER}</p>
                
        </div>
     
        <!---  aqui estão os campos -->
        <div class="col-md-4">

     
            <div class="form-group"> 
                <label></i> Email: </label>
                <input type="email"  class="form-control " name="txt_email" value="" placeholder="Digite seu email" required autocomplete="off">        

            </div>


            <div class="form-group"> 
                 <label> Senha: </label>
                 <input type="password"  class="form-control " name="txt_senha" value="" placeholder="Digite sua senha" required>        
           
            </div>


            <div class="form-group"> 
                
                <button class="btn btn-geral btn-block btn-lg"><i class="glyphicon glyphicon-log-in"></i> Entrar </button>
          
                
                
                
            </div>
            <div class="form-group"> 
                
                <a href="{$PAG_CADASTRO}" class="btn btn-default "><i class="glyphicon glyphicon-pencil"></i> Me Cadastrar</a>
             
                
                <a href="{$PAG_RECOVERY}" class="btn btn-default "><i class="glyphicon glyphicon-question-sign"></i> Esqueci a Senha</a>
           
                
                
            </div>

            
        </div><!-- fim dos campos -->


        <div class="col-md-4 text-center"> 
        
      
        </div>
    
    </form>
    
    
</section>
{/if}


