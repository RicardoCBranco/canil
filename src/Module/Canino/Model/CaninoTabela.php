<?php
namespace CasteloBranco\Canil\Module\Canino\Model;
use CasteloBranco\Canil\Interfaces\ITabela;
use CasteloBranco\Canil\Factory\Product;

/**
 * Description of CaninoTabela
 *
 * @author Ricardo
 */
class CaninoTabela implements ITabela{
    
    public static function delete(array $id) {
    }

    public static function find(array $id) {
        $ds = new \CasteloBranco\Canil\Data\Table\SelectData("canino");
        $ds->setWhere($id);
        $ds->setVals($id);
        return \CasteloBranco\Canil\Factory\Creator::
                factoryMethod(Canino::class,$ds->row());
    }

    public static function findAll() {
        $ds = new \CasteloBranco\Canil\Data\Table\SelectData("canino");
        $ds->setJoin("INNER", 'raca', 'canino', 'id_raca', 'id_raca');
        return $ds->table();
    }

    public static function insert($classe){
        $ds = new \CasteloBranco\Canil\Data\Table\InsertData("canino");
        $ds->setParams($classe->getParams());
        $ds->setCols(array_keys($classe->getValues()));
        $ds->setVals($classe->getValues());
        return (int)$ds->execute();
    }

    public static function update(Product $classeAnt, Product $classePos) {
        $vals = array_merge($classePos->getValues(), 
                array_change_key_case($classeAnt->getValues(),CASE_UPPER));
        
        $params = array_merge($classePos->getParams(), 
                array_change_key_case($classeAnt->getParams(),CASE_UPPER));
        
        $ds = new \CasteloBranco\Canil\Data\Table\UpdateData("canino");
        $ds->setCols(array_keys(array_filter($classePos->getValues())));
        $ds->setWhere(array_keys(array_filter($classeAnt->getValues())));
        $ds->setParams(array_filter($params));
        $ds->setVals(array_filter($vals));
        $ds->execute();
    }

}
