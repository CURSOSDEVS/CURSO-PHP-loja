<?php

    class Ferramentas{
        static function formatarValorBR($valor)
        {
            $retorno = number_format($valor,2,',','.');
            return $retorno;
        }

        static function dataAtualBR()
        {
            return date('d/m/Y');
        }
    }
    

?>