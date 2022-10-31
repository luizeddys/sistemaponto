<?php
    class Url {
        public static function redirecionar($url){
            if(headers_sent()){
                die("<script>location.replace('".url.$url."');</script>");
            }else{
                exit(header('Location:'.url.$url));
            }
        }
    }
?>