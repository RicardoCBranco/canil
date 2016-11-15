<?php
namespace CasteloBranco\Canil\Data;

/**
 * Description of Transation
 *
 * @author Antonio Ricardo Andrade Castelo Branco
 */
class DataSet {
    private $params = array();
    private $values = array();
    
    public function setParams(array $params) {
        $this->$params = array();
        $this->$params = $params;
    }

    public function setValues(array $values) {
        $this->$values = array();
        $this->$values = $values;
    }

        
    private function init($sql){       
        try{
            $con = Conexao::getConection();
            $stmt = $con->prepare($sql);
            foreach ($this->$values as $key => $values){
                $stmt->bindValue($key,$values,$this->$params[$key]);
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
    
    public static function table($sql){
        $table = $this->init($sql);
        return $table->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public static function execute($sql){
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
