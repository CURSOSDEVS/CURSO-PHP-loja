<h3>Lista de produtos</h3>
<hr>

<section id="paginacao" class="row">
    <center>
        PAGINAS
    </center>
</section>

<!--COMEÇA LISTA DE PRODUTOS-->
<section id="produtos" class="row">
    <ul style="list-style: none">
        <div class="row" id="pularlinha">
            {foreach from=$PROD item=P}
            <li class="col-md-4">
                <div class="thumbnail">
                    <a href="">
                        <img src="{$PASTA_IMAGENS}/{$P.pro_img}" alt="">
                        
                        <div class="caption">
                            <h4 class="text-center">{$P.pro_nome}</h4>
                            <h3 class="text-center text-danger">{$P.pro_valor}</h3>
                        </div>
                    </a>
                </div>
            </li>
            {/foreach}
        </div>
    </ul>
</section>

<section id="paginacao" class="row">
    <center>
        PAGINAS
    </center>
</section>