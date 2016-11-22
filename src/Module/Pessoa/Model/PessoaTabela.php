<?php
namespace CasteloBranco\Canil\Module\Pessoa\Model;

/**
 * Description of PessoaTabela
 *
 * @author Ricardo
 */
class PessoaTabela implements \CasteloBranco\Canil\Interfaces\ITabela{
    public static function getInstancia() {
        $ds = new \CasteloBranco\Canil\Data\ClientDataSet();
        return $ds->setTable("pessoa");
    }

    
    public static function delete(array $id) {
        
    }

    public static function find(array $id) {
        $ds = self::getInstancia();
        $dados = $ds->getRow($id);
        return \CasteloBranco\Canil\Factory\Creator::
                factoryMethod(Pessoa::class, $dados);
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
