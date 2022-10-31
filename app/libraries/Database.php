<?php
// Classe responsável pela conexão ao banco de dados
class Database {

    private $host = 'localhost';
    private $user = 'root';
    private $senha = '';
    private $db = 'sistemapontor2';
    private $port = '3306';
    private $dbh;
    private $stmt;


    public function __construct(){
        
        $dsn = 'mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->db;
        $opcoes = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->senha, $opcoes);

        } catch (PDOException $e){
            print "Erro!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function binding($parametro, $valor, $tipo = null){
        if(is_null($tipo)){
            switch(true):
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
                    break;
                endswitch;
        }

        $this->stmt->bindValue($parametro, $valor, $tipo);
    }

    public function exec(){
        return $this->stmt->execute();
    }

    public function resultado(){
        $this->exec();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function resultados(){
        $this->exec();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function totalResultados(){
        return $this->stmt->rowCount();
    }

    public function ultimoIdInserido(){
        return $this->dbh->lastInsertId();
    }
}

?>