<?php
namespace CasteloBranco\Canil\Chain\Table;
use CasteloBranco\Canil\Chain\Table\InsertData;
use PHPUnit_Framework_TestCase as PHPUnit;
/**
 * Description of InsertDataTest
 *
 * @author Ricardo
 */
class InsertDataTest extends PHPUnit {
    private $ins;
    public function setUp() {
       $this->ins = new InsertData("tbl_name");
    }
    
    public function testGetComandoInsert(){
        $this->assertEquals("INSERT INTO tbl_name () VALUES();", $this->ins->getComando());
    }
    
    public function testGetComandoColsEVals(){
        $this->ins->setCols(["col1","col2"]);
        $this->ins->setVals([15,"col1*2"]);
        $this->assertEquals("INSERT INTO tbl_name (col1,col2) VALUES(:15,:col1*2);",
                $this->ins->getComando());
    }
    
    public function testInsertVariosValues(){
        $this->ins->setCols(['a','b','c']);
        $this->ins->setVals([['1','2','3'],['4','5','6'],['7','8','9']]);
        $this->assertEquals("INSERT INTO tbl_name (a,b,c) VALUES(:1,:2,:3),(:4,:5,:6),(:7,:8,:9);",
                $this->ins->getComando());
    }
}
