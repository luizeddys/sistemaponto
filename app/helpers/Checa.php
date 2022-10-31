<?php
// Classe responsável por validação de campos pelos caracteres
class Checa {

    public static function checarEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }

    public static function checarTexto($texto){
        if(!preg_match('/^([áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+((\s[áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+)?$/', $texto)){
           return true;
        }else{
            return false;
        }
    }

    public static function checarNumero($numero){
        if(!preg_match('/\d/', $numero)){
            return true;
        }else{
            return false;
        }
    }

    public static function checarTelefone($telefone){
        if(!preg_match('/(\(?\d{2}\)?\s)?(\d{4,5}\-\d{4})/', $telefone)){
            return true;
        }else{
            return false;
        }
    }
}
?>