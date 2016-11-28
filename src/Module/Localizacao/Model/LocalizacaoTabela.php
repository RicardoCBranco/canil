<?php
namespace CasteloBranco\Canil\Module\Localizacao\Model;
use CasteloBranco\Canil\Interfaces\ITabela;

/**
 * Description of LocalizacaoTabela
 *
 * @author ricardo
 */
class LocalizacaoTabela implements ITabela{
    public static function getInstancia() {
        $ds = new \CasteloBranco\Canil\Data\ClientDataSet();
        $ds->setTable("localizacao");
        return $ds;
    }
    
    public static function delete(array $id) {
        $ds = self::getInstancia();
        $ds->doDelete($id);
    }

    public static function find(array $id) {
        $ds = self::getInstancia();
        return \CasteloBranco\Canil\Factory\Creator::
                factoryMethod(Localizacao::class, $ds->getRow($id));
    }

    public static function findAll() {
        $ds = self::getInstancia();
        $table = $ds->mountTable();
        return $ds->getTable($table);
    }

    public static function insert($classe) {
        $ds = self::getInstancia();
        return $ds->doInsert($classe);
    }

    public static function update($classeAnt, $classePos) {
        $ds = self::getInstancia();
        $ds->doUpdate($classeAnt, $classePos);
    }

}
