<?php
namespace CasteloBranco\Canil\Module\Raca\Model;

/**
 * Description of RacaTable
 *
 * @author Ricardo
 */
class RacaTabela implements \CasteloBranco\Canil\Interfaces\ITabela {    
    public static function delete(array $id) {
        
    }

    public static function find(array $id) {
        
    }

    public static function findAll() {
        $ds = new \CasteloBranco\Canil\Data\Table\SelectData("raca");
        $dados = $ds->table();
        return $dados;
    }

    public static function insert($classe) {
        
    }

    public static function update(\CasteloBranco\Canil\Factory\Product $classeAnt, \CasteloBranco\Canil\Factory\Product $classePos) {
        
    }


}
