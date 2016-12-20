<?php
namespace CasteloBranco\Canil\Data;
use CasteloBranco\Canil\Data\Table\SelectData;



/**
 * Description of Transation
 *
 * @author ricardo
 */
class Transation{
    private $table;
    private $select;
    
    public function __construct($table) {
        $this->table = $table;
    }

    public function getInstancia() {
        $ds = new ClientDataSet();
        $ds->setTable($this->table);
        return $ds;
    }
    
    public function delete($id) {
        $tr = $this->getInstancia();
        $tr->doDelete($id);
    }

    public function find($id) {
        $tr = $this->getInstancia();
        return $tr->getRow($id);
    }

    public function findAll() {
        $tr = $this->getInstancia();
        return $tr->getTable($this->select);
    }

    public function insert($classe) {
        $tr = $this->getInstancia();
        return $tr->doInsert($classe);
    }

    public function update($classeAnt, $classePos) {
        $tr = $this->getInstancia();
        $tr->doUpdate($classeAnt, $classePos);
    }
    
    public function getTable(){
        $tr = $this->getInstancia();
        return $tr->mountTable();
    }
    
    public function setTable(SelectData $table){
        $this->select = $table;
    }
}
