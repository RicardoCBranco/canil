<?php
namespace CasteloBranco\Canil\Data;

/**
 * Description of ClientDataSet
 *
 * @author ricardo
 */
class ClientDataSet {
    private $table;
    public function mountTable(){
        $table = new Table\SelectData($this->table);
        return $table;
    }
    
    public function getTable(Table\SelectData $table){
        return $table->table();
    }
    
    public function setTable($table) {
        $this->table = $table;
        return $this;
    }
    
    public function getRow(array $id){
        $ds = new Table\SelectData($this->table);
        $ds->setWhere($id);
        $ds->setVals($id);
        return $ds->row();
    }
    
    public function doInsert(\CasteloBranco\Canil\Factory\Product $classe){
        $ds = new Table\InsertData($this->table);
        $ds->setParams($classe->getParams());
        $ds->setCols(array_keys($classe->getValues()));
        $ds->setVals($classe->getValues());
        return (int)$ds->execute();
    }
    
    public function doUpdate($classeAnt,$classePos){
        $vals = array_merge($classePos->getValues(), 
                array_change_key_case($classeAnt->getValues(),CASE_UPPER));
        
        $params = array_merge($classePos->getParams(), 
                array_change_key_case($classeAnt->getParams(),CASE_UPPER));
        
        $ds = new \CasteloBranco\Canil\Data\Table\UpdateData($this->table);
        $ds->setCols(array_keys(array_filter($classePos->getValues())));
        $ds->setWhere(array_keys(array_filter($classeAnt->getValues())));
        $ds->setParams(array_filter($params));
        $ds->setVals(array_filter($vals));
        $ds->execute();
    }
    
    public function doDelete(array $id){
        $ds = new Table\DeleteData($this->table);
        $ds->setWhere($id);
        $ds->setVals($id);
        $ds->execute();
    }
}
