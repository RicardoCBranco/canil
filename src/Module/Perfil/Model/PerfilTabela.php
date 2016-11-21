<?php
namespace CasteloBranco\Canil\Module\Perfil\Model;

/**
 * Description of PerfilTabela
 *
 * @author Ricardo
 */
class PerfilTabela implements \CasteloBranco\Canil\Interfaces\ITabela{
    public static function delete(array $id) {
        
    }

    public static function find(array $id) {
        
    }

    public static function findAll() {
        $ds = new \CasteloBranco\Canil\Data\Table\SelectData("perfil");
        return $ds->table();
    }

    public static function insert($classe) {
        
    }

    public static function update(\CasteloBranco\Canil\Factory\Product $classeAnt, \CasteloBranco\Canil\Factory\Product $classePos) {
        
    }

}
