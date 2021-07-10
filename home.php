<?php
  

    $smarty = new Template();

    //enviar um banner para o template
    $smarty->assign('BANNER', Rotas::get_linkImagem('banner.jpg', 850, 160));

    $smarty->display('home.tpl');

    include_once Rotas::get_Pasta_Controller(). '/produtos.php';
  
?>