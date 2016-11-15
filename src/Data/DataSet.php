<?php
namespace CasteloBranco\Canil\Data;

/**
 * Description of Transation
 *
 * @author Antonio Ricardo Andrade Castelo Branco
 */
class DataSet {
    private static $params = array();
    private static $values = array();
    
    public static function setParams(array $params) {
        self::$params = array();
        self::$params = $params;
    }

    public static function setValues(array $values) {
        self::$values = array();
        self::$values = $values;
    }

        
    private static function init($sql){       
        try{
            $con = Conexao::getConection();
            $stmt = $con->prepare($sql);
            foreach (self::$values as $key => $values){
                $stmt->bindValue($key,$values,self::$params[$key]);
            }
            $stmt->execute();
            return $stmt;
        } catch (\PDOException $ex) {
            throw $ex;
        }
    }
    
    public static function row($sql){
        $stmt = self::init($sql);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row;
        
    }
    
    public static function table($sql){
        $table = self::init($sql);
        return $table->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public static function execute($sql){
        try{
            $con = Conexao::getConection();
            $stmt = $con->prepare($sql);
            foreach (self::$values as $key => $values){
                $stmt->bindValue($key,$values,self::$params[$key]);
            }
            $stmt->execute();
            return $con->lastInsertId();
        } catch (\PDOException $ex) {
            throw $ex;
        }
    }
}
