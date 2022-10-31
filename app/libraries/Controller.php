<?php
    class Controller{
        // Função responsável por chamar as páginas Model
        public function model($model){
            require_once '../app/models/'.$model.'.php';
            return new $model;
        }

        // Função responsável por chamar os arquivos de visualização
        public function view($view, $dados = []){
            $arquivo = ('../app/views/'.$view.'.php');

            if(file_exists($arquivo)){
                require_once $arquivo;
            }else{
                die('<p class="view-erro">Erro ao carregar (View load error)</p>');
            }
        }
    }
?>