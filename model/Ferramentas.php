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

        /**
    * 
    * @param type int: tamanho da senha
    * @return string: senha randonica
    */
    static function GerarSenha(){
		//2	  // fe45214qa  mqws23ma  0o z b
        $tamanho = 1;
	$string ="";
			
	for ($i = 0; $i < $tamanho; $i++) {
				
		 //$string .= (rand(1, 9)) ;
				   $string .= chr(rand(109, 122));
                                   $string .= rand(40, 99);
                                   $string .= chr(rand(109, 122));
                                   $string .= rand(20, 89);
                                   $string .= chr(rand(109, 122));
                                   $string .= chr(rand(109, 122));
                                   //$string .= rand(20, 89);
                                   //$string .= rand(20, 89);		  
			}
			$string = str_replace('o', 'z', $string);
			$string = str_replace('0', 'b', $string);
			
			return $string;
			
	}

    /**
     * 
     * @param string $valor original 
     * @return string valor criptografado
     */
    static function Criptografia($valor){
        
        return hash('SHA512', $valor);
        
    }
        

}
    

?>