<?php
namespace CasteloBranco\Canil\Module\Perfil\Model;

/**
 * Description of PerfilTabela
 *
 * @author Ricardo
 */
class PerfilTabela implements \CasteloBranco\Canil\Interfaces\ITabela{
    public static function getInstancia() {
        $ds = new \CasteloBranco\Canil\Data\ClientDataSet();
        $ds->setTable("perfil");
        return $ds;
    }
    
    public static function delete(array $id) {
        
    }

    public static function find(array $id) {
        $ds = self::getInstancia();
        $dados = $ds->getRow($id);
        return \CasteloBranco\Canil\Factory\Creator::factoryMethod(Perfil::class,$dados);
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
