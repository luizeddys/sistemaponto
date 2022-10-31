<?php
    class Administrativo {
        private $db;
    
        public function __construct(){
            $this->db = new Database();
        }

        public function verificaLogin($user, $senha){
            $this->db->query("SELECT * FROM admin_users WHERE user = :user");
            $this->db->binding("user", $user);

            if($this->db->resultado()){
                $resultado = $this->db->resultado();
                if(password_verify($senha, $resultado->senha)){
                    return $resultado;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function getUsuarios(){
            $this->db->query("SELECT * FROM funcionarios");

            if($this->db->resultados()){
                return $this->db->resultados();
            }else{
                return false;
            }
        }

        public function validaFuncionario($id){
            $this->db->query("SELECT * FROM funcionarios WHERE id = :id");
            $this->db->binding("id", $id);
    
            if($this->db->resultado()){
                return true;
            }else{
                return false;
            }
        }

        public function getHistorico($id){
            $this->db->query("SELECT id FROM funcionarios WHERE id = :id");
            $this->db->binding("id", $id);
    
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

        public function getInfoUser($id){
            $this->db->query("SELECT * FROM funcionarios WHERE id = :id");
            $this->db->binding("id", $id);
    
            if($this->db->resultado()){
                return $this->db->resultado();
            }else{
                return false;
            }
        }
    }
?>