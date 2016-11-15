<?php
namespace CasteloBranco\Canil\Module\Canino\Model;
use CasteloBranco\Canil\Interfaces\ITabela;

/**
 * Description of CaninoTabela
 *
 * @author Ricardo
 */
class CaninoTabela implements ITabela{
    
    public static function delete(array $id) {
    }

    public static function find(array $id) {
    }

    public static function findAll() {
        $ds = new \CasteloBranco\Canil\Data\Table\SelectData("canino");
        return $ds->table();
    }

    public static function insert($classe){
    }

    public static function update($classe) {
    }

}
