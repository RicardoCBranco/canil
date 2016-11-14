<?php
namespace CasteloBranco\Canil\Chain\Table;
use PHPUnit_Framework_TestCase as PHPUnit;
use CasteloBranco\Canil\Chain\Table\UpdateData;
/**
 * Description of UpdateDataTest
 *
 * @author Ricardo
 */
class UpdateDataTest extends PHPUnit{
    private $tbl;
    private $order = array();
    public function testUpdate(){
        $this->tbl = new UpdateData("t1");
        $this->tbl->setCols(["col1"]);
        $this->tbl->setVals(["col1 + 1"]);
        $this->assertEquals("UPDATE t1 SET col1 = col1 + 1;",$this->tbl->getComando());
    }
    
    public function testUpdateVariosValues(){
        $this->tbl = new UpdateData("t1");
        $this->tbl->setCols(["col1","col2"]);
        $this->tbl->setVals(["col1 + 1","col1"]);
        $this->assertEquals("UPDATE t1 SET col1 = col1 + 1,col2 = col1;",$this->tbl->getComando());
    }
    
    public function testUpdateOrder(){
        $this->tbl = new UpdateData("t");
        $this->tbl->setCols(["id"]);
        $this->tbl->setVals(["id + 1"]);
        $this->tbl->setOrder("id","DESC");
        $this->assertEquals("UPDATE t SET id = id + 1 ORDER BY id DESC;",$this->tbl->getComando());
    }
    
    public function testUpdateWhere(){
        $this->tbl = new UpdateData("items,month");
        $this->tbl->setCols(["items.price"]);
        $this->tbl->setVals(["month.price"]);
        $this->tbl->setWhere(["items.id = month.id"]);
        $this->assertEquals("UPDATE items,month SET items.price = month.price ".
                "WHERE items.id = month.id;",$this->tbl->getComando());
    }
}
