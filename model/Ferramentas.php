<?php

    class Ferramentas{
        static function formatarValorBR($valor)
        {
            $retorno = number_format($valor,2,',','.');
            return $retorno;
        }

        static function formatarValorUS($valor)
        {
            $retorno = number_format($valor,2,'.',',');
            return $retorno;
        }

        static function dataAtualBR()
        {
            return date('d/m/Y');
        }

        /**
         * 
         * @return String: data atual US (formato MYSQL)
         */
        static function DataAtualUS()
        {
            return date('Y-m-d') ;
        }
        
        /**
         * 
         * @return string: hora atual, hora , minuto e segundo
         */
        static function HoraAtual(){
            
            return date('H:i:s') ;
        }

    }
    

?>