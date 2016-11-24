<?php
namespace CasteloBranco\Canil\Module\Raca\Model;

/**
 * Description of RacaTable
 *
 * @author Ricardo
 */
class RacaTabela implements \CasteloBranco\Canil\Interfaces\ITabela {    
    public static function getInstancia() {
        $ds = new \CasteloBranco\Canil\Data\ClientDataSet();
        $ds->setTable("raca");
        return $ds;
    }

    
    public static function delete(array $id) {
        $ds = self::getInstancia();
        $ds->doDelete($id);
    }

    public static function find(array $id) {
        $ds = self::getInstancia();
        return $ds->getRow($id);
    }

    public static function findAll() {
        $ds = self::getInstancia();
        $table = $ds->mountTable();
        return $ds->getTable($table);
    }

    public static function insert($classe) {
        $ds = self::getInstancia();
        $ds->doInsert($classe);
    }

    public static function update($classeAnt, $classePos) {
        $ds = self::getInstancia();
        $ds->doUpdate($classeAnt, $classePos);
    }


}
