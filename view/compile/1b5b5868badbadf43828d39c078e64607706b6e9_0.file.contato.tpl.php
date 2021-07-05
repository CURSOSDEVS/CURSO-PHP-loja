<?php
/* Smarty version 3.1.39, created on 2021-07-05 18:08:58
  from 'C:\xampp\htdocs\loja_virtual\view\contato.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60e32e9a9b0db2_21094846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b5b5868badbadf43828d39c078e64607706b6e9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja_virtual\\view\\contato.tpl',
      1 => 1625501329,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60e32e9a9b0db2_21094846 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <div class="row">
        
        <form class="form-horizontal" id="frmcontatoazul" action="envio">
          <fieldset>
          
            <!-- Form Name -->
            <legend>Contato</legend>
            
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txtinputnome">Nome</label> 
              <div class="col-md-8">
              <input id="txtinputnome" name="txtinputnome" placeholder="Escreva seu nome completo" class="form-control input-md" required="required" type="text" />
              <span class="help-block">help</span>  
              </div>
            </div>
            
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txtinputemail">Email</label>  
              <div class="col-md-8">
              <input id="txtinputemail" name="txtinputemail" placeholder="Coloque um email válido" class="form-control input-md" required="required" type="email" />
              <span class="help-block">help</span>  
              </div>
            </div>
             
            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txtinputarea">Mensagem</label>
              <div class="col-md-8">                     
                <textarea class="form-control" id="txtinputarea" rows="6" name="txtinputarea" placeholder="Digite sua pergunta"></textarea>
              </div>
            </div>
            
            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="btnenviar"></label>
              <div class="col-md-8">
                <button id="btnenviar" name="btnenviar" class="btn btn-primary btn-lg">Enviar</button>
              </div>
            </div>
          
          </fieldset>
        </form>
        
	</div>
</div><?php }
}
