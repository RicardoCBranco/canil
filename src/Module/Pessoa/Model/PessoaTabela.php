<?php
namespace CasteloBranco\Canil\Module\Pessoa\Model;

/**
 * Description of PessoaTabela
 *
 * @author Ricardo
 */
class PessoaTabela implements \CasteloBranco\Canil\Interfaces\ITabela{
    public static function delete(array $id) {
        
    }

    public static function find(array $id) {
        
    }

    public static function findAll() {
        $ds = new \CasteloBranco\Canil\Data\Table\SelectData("pessoa");
        $dados = $ds->table();
        return $dados;
    }

    public static function insert($classe) {
        
    }

    public static function update(\CasteloBranco\Canil\Factory\Product $classeAnt, \CasteloBranco\Canil\Factory\Product $classePos) {
        
    }



}
