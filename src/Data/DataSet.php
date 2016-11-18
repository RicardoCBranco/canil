<?php
namespace CasteloBranco\Canil\Data;

/**
 * Description of Transation
 *
 * @author Antonio Ricardo Andrade Castelo Branco
 */
class DataSet {
    private $params = array();
    protected $values = array();
    
    public function setParams(array $params) {
        $this->params = array();
        $this->params = $params;
    }
        
    private function init($sql){
        try{
            $con = Conexao::getConection();
            $stmt = $con->prepare($sql);
            foreach ($this->values as $key => $values){
                if(!isset($this->params[$key])){
                    $this->params[$key] = \PDO::PARAM_STR;
                }
                $stmt->bindValue($key,$values,$this->params[$key]);
            }
            $stmt->execute();
            return $stmt;
        } catch (\PDOException $ex) {
            throw $ex;
        }
    }
    
    public function row($sql){
        $stmt = $this->init($sql);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row;
        
    }
    
    public function table($sql){
        $table = $this->init($sql);
        return $table->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public function execute($sql){
        try{
            $con = Conexao::getConection();
            $stmt = $con->prepare($sql);
            foreach ($this->values as $key => $values){
                $stmt->bindValue($key,$values,$this->params[$key]);
            }
            $stmt->execute();
            return $con->lastInsertId();
        } catch (\PDOException $ex) {
            throw $ex;
        }
    }
}
