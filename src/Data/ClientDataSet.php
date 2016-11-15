<?php
namespace CasteloBranco\Canil\Data;

/**
 * Description of DataSet
 *
 * @author Antonio Ricardo Andrade Castelo Branco
 */
class ClientDataSet {
    private $table;
    
    public function __construct($table) {
        $this->table = $table;
    }
    
    public function delete(array $busca) {
        $sql = new \CasteloBranco\Canil\Chain\Table\DeleteData($this->table);
        foreach ($busca as $id => $value){
            $params[$id] = \PDO::PARAM_STR;
            $values[$id] = $value;
        }
        $sql->setCols($value);
        $sql->setVals($value);
        
        DataSet::setParams($params);
        DataSet::setValues($values);
        DataSet::execute($sql->getComando());
    }

    public function findAll(){
        $sql = new \CasteloBranco\Canil\Chain\Table\SelectData($this->table);
        return DataSet::table($sql->getComando());
    }
    
    public function find(array $busca){
        $sql = new \CasteloBranco\Canil\Chain\Table\SelectData($this->table);
        $sql->setWhere($busca);
        DataSet::setParams($params);
        DataSet::setValues($values);
        return DataSet::row($sql->getComando());
    }
    
    
    public function insert($classe) {
        $sql = new \CasteloBranco\Canil\Chain\Table\InsertData($this->table);
        $sql->setCols(array_keys($classe->getValues()));
        $sql->setVals(array_keys($classe->getValues()));
        DataSet::setValues($classe->getValues());
        DataSet::setParams($classe->getParams());
        return DataSet::execute($sql->getComando());
    }
    
    public function update($classe) {
        $sql = new \CasteloBranco\Canil\Chain\Table\UpdateData($this->table);
        DataSet::setValues($classe->getValues());
        DataSet::setParams($classe->getParams());
        DataSet::execute($sql->getComando());
    }
}
