<?php
namespace CasteloBranco\Canil\Data;

/**
 * Description of DataSet
 *
 * @author Antonio Ricardo Andrade Castelo Branco
 */
class DataSet {
    private static $sql;
    
    public static function setTabela($tabela, $id){
        self::$sql = new \CasteloBranco\Canil\SqlCreate\ComandoSql($tabela, $id);
    }
    
    public static function delete(array $busca) {
        foreach ($busca as $id => $value){
            $params[$id] = \PDO::PARAM_STR;
            $values[$id] = $value;
        }
        Transation::setParams($params);
        Transation::setValues($values);
        Transation::execute(self::$sql->delete($busca));
    }

    public static function findAll(){
        return Transation::table(self::$sql->select());
    }
    
    public static function find(array $busca){
        self::$sql->setBusca($busca);
        Transation::setParams($params);
        Transation::setValues($values);
        return Transation::row(self::$sql);
    }
    
    public static function insert($classe) {
        Transation::setValues($classe->getValues());
        Transation::setParams($classe->getParams());
        return Transation::execute(str_replace('\'\'','NULL',self::$sql->insert(array_keys($classe->getValues()))));
    }
    
    public static function update($classe) {
        Transation::setValues($classe->getValues());
        Transation::setParams($classe->getParams());
        Transation::execute(self::$sql->update(array_keys($classe->getValues())));
    }
}
