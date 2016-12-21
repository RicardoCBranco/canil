<?php
namespace CasteloBranco\Canil\Module\Pessoa\Model;

/**
 * Description of PessoaTabela
 *
 * @author Ricardo
 */
class PessoaTabela implements \CasteloBranco\Canil\Interfaces\ITabela{
    public static function getInstancia() {
        $tr = new \CasteloBranco\Canil\Data\Transation("pessoa");
        return $tr;
    }

    
    public static function delete($id) {
        $tr = self::getInstancia();
        $tr->delete($id);
    }

    public static function find($id) {
        $tr = self::getInstancia();
        $dados = $tr->find($id);
        return \CasteloBranco\Canil\Factory\Creator::
                factoryMethod(Pessoa::class, $dados);
    }

    public static function findAll() {
        $tr = self::getInstancia();
        $table = $tr->getTable();
        $tr->setTable($table);
        return $tr->findAll();
    }

    public static function insert($classe) {
        $tr = self::getInstancia();
        return $tr->insert($classe);
    }

    public static function update($classeAnt, $classePos) {
        $tr = self::getInstancia();
        $tr->update($classeAnt, $classePos);
    }
}
