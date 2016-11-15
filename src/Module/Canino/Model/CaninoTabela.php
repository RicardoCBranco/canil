<?php
namespace CasteloBranco\Canil\Module\Canino\Model;
use CasteloBranco\Canil\Interfaces\ITabela;

/**
 * Description of CaninoTabela
 *
 * @author Ricardo
 */
class CaninoTabela implements ITabela{
    private $ds;
    public function __construct() {
        $this->ds = new \CasteloBranco\Canil\Data\ClientDataSet("canino");
    }
    
    public function delete(array $id) {
        $this->ds->delete($id);
    }

    public function find(array $id) {
        return $this->ds->find($id);
    }

    public function findAll() {
        return $this->ds->findAll();
    }

    public function insert($classe){
        return $this->ds->insert($classe);
    }

    public function update($classe) {
        $this->ds->update($classe);
    }

}
