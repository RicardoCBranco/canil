<?php
namespace CasteloBranco\Canil\Module\Perfil\Model;

/**
 * Description of PerfilTabela
 *
 * @author Ricardo
 */
class PerfilTabela implements \CasteloBranco\Canil\Interfaces\ITabela{
    public static function getInstancia() {
        $tr = new \CasteloBranco\Canil\Data\Transation("perfil");
        return $tr;
    }
    
    public static function delete($id) {
        $tr = self::getInstancia();
        $tr->delete($id);
    }

    public static function find($id) {
        $tr = self::getInstancia();
        $dados = $tr->find($id);
        return \CasteloBranco\Canil\Factory\Creator::factoryMethod(Perfil::class,$dados);
    }

    public static function findAll() {
        $tr = self::getInstancia();
        $table = $tr->getTable();
        $tr->setTable($table);
        return $tr->findAll();
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
