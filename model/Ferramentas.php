<?php

    class Ferramentas{
        static function formatarValor($valor)
        {
            $retorno = number_format($valor,2,',','.');
            return $retorno;
        }
    }
    

?>