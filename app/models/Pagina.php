<?php
class Pagina {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function validaFuncionario($dados){
        $this->db->query("SELECT nome FROM funcionarios WHERE codigo = :codigo");
        $this->db->binding("codigo", $dados['codigo']);

        if($this->db->resultado()){
            return true;
        }else{
            return false;
        }
    }

    public function validaPonto($dados){
        $this->db->query("SELECT id FROM funcionarios WHERE codigo = :codigo");
        $this->db->binding("codigo", $dados['codigo']);

        if($this->db->resultado()){
            $retorno = $this->db->resultado();
            $idUsuario = $retorno->id;

            $this->db->query("SELECT id FROM pontos WHERE id_funcionario = :idFunc AND tipo_ponto = 1 AND data = :data");
            $this->db->binding("idFunc", $idUsuario);
            $this->db->binding("data", $dados['data']);

            if($this->db->resultado()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function validaPontoSaida($dados){
        $this->db->query("SELECT id FROM funcionarios WHERE codigo = :codigo");
        $this->db->binding("codigo", $dados['codigo']);

        if($this->db->resultado()){
            $retorno = $this->db->resultado();
            $idUsuario = $retorno->id;

            $this->db->query("SELECT id FROM pontos WHERE id_funcionario = :idFunc AND tipo_ponto = 2 AND data = :data");
            $this->db->binding("idFunc", $idUsuario);
            $this->db->binding("data", $dados['data']);

            if($this->db->resultado()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function validaPontoSaidaJustificada($dados){
        $this->db->query("SELECT id FROM funcionarios WHERE codigo = :codigo");
        $this->db->binding("codigo", $dados['codigo']);

        if($this->db->resultado()){
            $retorno = $this->db->resultado();
            $idUsuario = $retorno->id;

            $this->db->query("SELECT id FROM pontos WHERE id_funcionario = :idFunc AND tipo_ponto = 5 AND data = :data");
            $this->db->binding("idFunc", $idUsuario);
            $this->db->binding("data", $dados['data']);

            if($this->db->resultado()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function validaPontoSaidaIntervalo($dados){
        $this->db->query("SELECT id FROM funcionarios WHERE codigo = :codigo");
        $this->db->binding("codigo", $dados['codigo']);

        if($this->db->resultado()){
            $retorno = $this->db->resultado();
            $idUsuario = $retorno->id;

            $this->db->query("SELECT id FROM pontos WHERE id_funcionario = :idFunc AND tipo_ponto = 3 AND data = :data");
            $this->db->binding("idFunc", $idUsuario);
            $this->db->binding("data", $dados['data']);

            if($this->db->resultado()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function validaPontoEntradaIntervalo($dados){
        $this->db->query("SELECT id FROM funcionarios WHERE codigo = :codigo");
        $this->db->binding("codigo", $dados['codigo']);

        if($this->db->resultado()){
            $retorno = $this->db->resultado();
            $idUsuario = $retorno->id;

            $this->db->query("SELECT id FROM pontos WHERE id_funcionario = :idFunc AND tipo_ponto = 4 AND data = :data");
            $this->db->binding("idFunc", $idUsuario);
            $this->db->binding("data", $dados['data']);

            if($this->db->resultado()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function computarEntrada($dados){
        $this->db->query("SELECT id FROM funcionarios WHERE codigo = :codigo");
        $this->db->binding("codigo", $dados['codigo']);

        if($this->db->resultado()){
            $retorno = $this->db->resultado();
            $idUsuario = $retorno->id;

            $this->db->query("INSERT INTO pontos (id_funcionario, tipo_ponto, data, hora) VALUES (:idFunc, 1, :data, :hora);");
            $this->db->binding("idFunc", $idUsuario);
            $this->db->binding("data", $dados['data']);
            $this->db->binding("hora", $dados['hora']);

            if($this->db->exec()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function computarSaida($dados){
        $this->db->query("SELECT id FROM funcionarios WHERE codigo = :codigo");
        $this->db->binding("codigo", $dados['codigo']);

        if($this->db->resultado()){
            $retorno = $this->db->resultado();
            $idUsuario = $retorno->id;

            $this->db->query("INSERT INTO pontos (id_funcionario, tipo_ponto, data, hora) VALUES (:idFunc, 2, :data, :hora);");
            $this->db->binding("idFunc", $idUsuario);
            $this->db->binding("data", $dados['data']);
            $this->db->binding("hora", $dados['hora']);

            if($this->db->exec()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function computarSaidaJustificada($dados){
        $this->db->query("SELECT id FROM funcionarios WHERE codigo = :codigo");
        $this->db->binding("codigo", $dados['codigo']);

        if($this->db->resultado()){
            $retorno = $this->db->resultado();
            $idUsuario = $retorno->id;

            $this->db->query("INSERT INTO pontos (id_funcionario, tipo_ponto, data, hora) VALUES (:idFunc, 5, :data, :hora);");
            $this->db->binding("idFunc", $idUsuario);
            $this->db->binding("data", $dados['data']);
            $this->db->binding("hora", $dados['hora']);

            if($this->db->exec()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function computarSaidaIntervalo($dados){
        $this->db->query("SELECT id FROM funcionarios WHERE codigo = :codigo");
        $this->db->binding("codigo", $dados['codigo']);

        if($this->db->resultado()){
            $retorno = $this->db->resultado();
            $idUsuario = $retorno->id;

            $this->db->query("INSERT INTO pontos (id_funcionario, tipo_ponto, data, hora) VALUES (:idFunc, 3, :data, :hora);");
            $this->db->binding("idFunc", $idUsuario);
            $this->db->binding("data", $dados['data']);
            $this->db->binding("hora", $dados['hora']);

            if($this->db->exec()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function computarEntradaIntervalo($dados){
        $this->db->query("SELECT id FROM funcionarios WHERE codigo = :codigo");
        $this->db->binding("codigo", $dados['codigo']);

        if($this->db->resultado()){
            $retorno = $this->db->resultado();
            $idUsuario = $retorno->id;

            $this->db->query("INSERT INTO pontos (id_funcionario, tipo_ponto, data, hora) VALUES (:idFunc, 4, :data, :hora);");
            $this->db->binding("idFunc", $idUsuario);
            $this->db->binding("data", $dados['data']);
            $this->db->binding("hora", $dados['hora']);

            if($this->db->exec()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function getHistorico($codigo){
        $this->db->query("SELECT id FROM funcionarios WHERE codigo = :codigo");
        $this->db->binding("codigo", $codigo);

        if($this->db->resultado()){
            $retorno = $this->db->resultado();
            $idUsuario = $retorno->id;

            $this->db->query("SELECT p.*, tp.tipo_ponto as tipo FROM pontos as p, tipo_ponto as tp WHERE p.id_funcionario = :cod AND tp.id = p.tipo_ponto ORDER BY p.data DESC");
            $this->db->binding("cod", $idUsuario);

            if($this->db->resultados()){
                return $this->db->resultados();
            }else{
                return false;
            }
        }
    }

    public function getInfoUser($codigo){
        $this->db->query("SELECT * FROM funcionarios WHERE codigo = :codigo");
        $this->db->binding("codigo", $codigo);

        if($this->db->resultado()){
            return $this->db->resultado();
        }else{
            return false;
        }
    }
}   
?>