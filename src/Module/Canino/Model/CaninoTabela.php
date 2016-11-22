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
        $ds = new \CasteloBranco\Canil\Data\ClientDataSet();
        $ds->setTable("canino");
        return $ds;
    }

    
    public static function delete(array $id) {
    }

    public static function find(array $id) {
        $ds = self::getInstancia();
        return \CasteloBranco\Canil\Factory\Creator::
                factoryMethod(Canino::class,$ds->getRow($id));
    }

    public static function findAll() {
        $ds = self::getInstancia();
        $table = $ds->mountTable();
        $table->setJoin("INNER", 'raca', 'canino', 'id_raca', 'id_raca');
        return $ds->getTable($table);
    }

    public static function insert($classe){
        $ds = self::getInstancia();
        return $ds->doInsert($classe);
    }

    public static function update($classeAnt, $classePos) {
        $ds = self::getInstancia();
        $ds->doUpdate($classeAnt, $classePos);
    }

}
