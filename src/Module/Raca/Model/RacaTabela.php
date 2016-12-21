<?php
namespace CasteloBranco\Canil\Module\Raca\Model;

/**
 * Description of RacaTable
 *
 * @author Ricardo
 */
class RacaTabela implements \CasteloBranco\Canil\Interfaces\ITabela {    
    public static function getInstancia() {
       $tr = new \CasteloBranco\Canil\Data\Transation("raca");
       return $tr;
    }

    
    public static function delete($id) {
        $tr = self::getInstancia();
        $tr->delete($id);
    }

    public static function find($id) {
        $tr = self::getInstancia();
        return $tr->find($id);
    }

    public static function findAll() {
        $tr = self::getInstancia();
        $table = $tr->getTable();
        $tr->setTable($table);
        return $tr->findAll();
    }

    public static function insert($classe) {
        $tr = self::getInstancia();
        return $tr->insert($classe);
    }

    public static function update($classeAnt, $classePos) {
        $tr = self::getInstancia();
        $tr->update($classeAnt, $classePos);
    }
}
