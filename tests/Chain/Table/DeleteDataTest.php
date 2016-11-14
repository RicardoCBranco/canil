<?php
namespace CasteloBranco\Canil\Chain\Table;
use PHPUnit_Framework_TestCase as PHPUnit;
/**
 * Description of DeleteDataTest
 *
 * @author Ricardo
 */
class DeleteDataTest extends PHPUnit{
    private $tbl;
    public function testDelete(){
        $this->tbl = new DeleteData("somelog");
        $this->tbl->setWhere(["user = 'jcole'"]);
        $this->tbl->setOrder("timestamp_column");
        $this->tbl->setLimit(["1"]);
        $this->assertEquals("DELETE FROM somelog WHERE user = 'jcole' ".
                "ORDER BY timestamp_column LIMIT 1;", $this->tbl->getComando());
    }
    
    public function testDeleteMultTabelas(){
        $this->tbl = new DeleteData("t1");
        $this->tbl->setCols(["t1","t2"]);
        $this->tbl->setJoin('INNER',"t2");
        $this->tbl->setJoin("INNER","t3");
        $this->tbl->setWhere(["t1.id=t2.id","t2.id=t3.id"]);
        $this->assertEquals("DELETE t1,t2 FROM t1 INNER JOIN t2 INNER JOIN t3".
            " WHERE t1.id=t2.id AND t2.id=t3.id;",$this->tbl->getComando());
    }
}
