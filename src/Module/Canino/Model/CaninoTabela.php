<?php
namespace CasteloBranco\Canil\Module\Canino\Model;
use CasteloBranco\Canil\Interfaces\ITabela;
use CasteloBranco\Canil\Data\DataSet;

/**
 * Description of CaninoTabela
 *
 * @author Ricardo
 */
class CaninoTabela extends DataSet implements ITabela{
    
    public static function getInstancia() {
        parent::setTabela('canino', "id_canino");
    }
    
    public static function delete(array $id) {
        
    }

    public static function find(array $id) {
        
    }

    public static function findAll() {
        self::getInstancia();
        return parent::findAll();
    }

    public static function insert($classe){
        
    }

    public static function update($classe) {
        
    }

}
