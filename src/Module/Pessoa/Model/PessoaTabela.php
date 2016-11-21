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
        $ds = new \CasteloBranco\Canil\Data\Table\SelectData("pessoa");
        $ds->setWhere($id);
        $ds->setVals($id);
        $pessoa = \CasteloBranco\Canil\Factory\Creator::
                factoryMethod(Pessoa::class, $ds->row());
        return $pessoa;
    }

    public static function findAll() {
        $ds = new \CasteloBranco\Canil\Data\Table\SelectData("pessoa");
        $dados = $ds->table();
        return $dados;
    }

    public static function insert($classe) {
        $ds = new \CasteloBranco\Canil\Data\Table\InsertData("pessoa");
        $ds->setParams($classe->getParams());
        $ds->setVals($classe->getValues());
        $ds->setCols(array_keys($classe->getValues()));
        return (int)$ds->execute();
    }

    public static function update(\CasteloBranco\Canil\Factory\Product $classeAnt, \CasteloBranco\Canil\Factory\Product $classePos) {
        $vals = array_merge($classePos->getValues(), 
                array_change_key_case($classeAnt->getValues(),CASE_UPPER));
        
        $params = array_merge($classePos->getParams(), 
                array_change_key_case($classeAnt->getParams(),CASE_UPPER));
        
        $ds = new \CasteloBranco\Canil\Data\Table\UpdateData("pessoa");
        $ds->setCols(array_keys(array_filter($classePos->getValues())));
        $ds->setWhere(array_keys(array_filter($classeAnt->getValues())));
        $ds->setParams(array_filter($params));
        $ds->setVals(array_filter($vals));
        $ds->execute();
    }



}
