<?php
namespace CasteloBranco\Canil\Module\Canino\Model;
use CasteloBranco\Canil\Interfaces\ITabela;

/**
 * Description of CaninoTabela
 *
 * @author Ricardo
 */
class CaninoTabela implements ITabela{
    
    public static function delete(array $id) {
    }

    public static function find(array $id) {
    }

    public static function findAll() {
        $ds = new \CasteloBranco\Canil\Data\Table\SelectData("canino");
        return $ds->table();
    }

    public static function insert($classe){
        $ds = new \CasteloBranco\Canil\Data\Table\InsertData("canino");
        $ds->setParams($classe->getParams());
        $ds->setCols(array_keys($classe->getValues()));
        $ds->setVals($classe->getValues());
        return (int)$ds->execute();
    }

    public static function update($classe) {
    }

}
