<?php
namespace CasteloBranco\Canil\Module\Canil\Model;
use CasteloBranco\Canil\Interfaces\ITabela;

/**
 * Description of LocalizacaoTabela
 *
 * @author ricardo
 */
class CanilTabela implements ITabela{
    public static function getInstancia() {
        $ds = new \CasteloBranco\Canil\Data\Transation("canil");
        return $ds;
    }
    
    public static function delete($id) {
        $ds = self::getInstancia();
        $ds->delete($id);
    }

    public static function find($id) {
        $ds = self::getInstancia();
        return \CasteloBranco\Canil\Factory\Creator::
                factoryMethod(Canil::class, $ds->find($id));
    }

    public static function findAll() {
        $ds = self::getInstancia();
        $table = $ds->getTable();
        $ds->setTable($table);
        return $ds->findAll();
    }

    public static function insert($classe) {
        $ds = self::getInstancia();
        return $ds->insert($classe);
    }

    public static function update($classeAnt, $classePos) {
        $ds = self::getInstancia();
        $ds->update($classeAnt, $classePos);
    }

}
