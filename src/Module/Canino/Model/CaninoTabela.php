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
    public static function getInstancia() {
        $ds = new \CasteloBranco\Canil\Data\Transation("canino");
        return $ds;
    }

    
    public static function delete($id) {
        $ds = self::getInstancia();
        $ds->delete($id);
    }

    public static function find($id) {
        $ds = self::getInstancia();
        return \CasteloBranco\Canil\Factory\Creator::
                factoryMethod(Canino::class,$ds->find($id));
    }

    public static function findAll() {
        $ds = self::getInstancia();
        $table = $ds->getTable();
        $table->setJoin("INNER", 'raca', 'canino', 'id_raca', 'id_raca');
        $ds->setTable($table);
        return $ds->findAll();
    }

    public static function insert($classe){
        $ds = self::getInstancia();
        return $ds->insert($classe);
    }

    public static function update($classeAnt, $classePos) {
        $ds = self::getInstancia();
        $ds->update($classeAnt, $classePos);
    }

}
