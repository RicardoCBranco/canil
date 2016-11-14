<?php
namespace CasteloBranco\Canil\Chain\Table;
use PHPUnit_Framework_TestCase as PHPUnit;
use CasteloBranco\Canil\Chain\Table\SelectData;
/**
 * Description of SelectDataTest
 *
 * @author Ricardo
 */
class SelectDataTest extends PHPUnit{
    private $tbl;
    
    public function testGetComando(){
        $this->tbl = new SelectData("t1");
        $this->tbl->setJoin("INNER", "t2", "c2", "t1", "c1");
        $this->assertEquals('SELECT * FROM t1 INNER JOIN t2 ON(t2.c2=t1.c1);', $this->tbl->getComando());
    }
    
    public function testConcat(){
        $this->tbl = new SelectData('mytable');
        $this->tbl->setConcat(["last_name","', '","first_name"], 'full_name');
        $this->tbl->setOrder('full_name');
        $this->assertEquals("SELECT CONCAT(last_name,', ',first_name) AS full_name ".
            "FROM mytable ORDER BY full_name;",$this->tbl->getComando());
    }
    
    public function testGroupBy(){
        $this->tbl = new SelectData("test_table");
        $this->tbl->setCols(["a","COUNT(b)"]);
        $this->tbl->setGroup(["a"]);
        $this->tbl->setOrder("NULL");
        $this->assertEquals("SELECT a,COUNT(b) FROM test_table GROUP BY a ORDER BY NULL;",
                $this->tbl->getComando());
    }
    
    public function testHaving(){
        $this->tbl = new SelectData("t");
        $this->tbl->setCols(["COUNT(col1) AS col2"]);
        $this->tbl->setGroup(["col2"]);
        $this->tbl->setHaving(["col2 = 2"]);
        $this->assertEquals("SELECT COUNT(col1) AS col2 FROM t GROUP BY col2 HAVING col2 = 2;",
                $this->tbl->getComando());
    }
    
    public function testWhere(){
        $this->tbl = new SelectData("tbl_name");
        $this->tbl->setCols(["col_name"]);
        $this->tbl->setWhere(["col_name > 0"]);
        $this->assertEquals("SELECT col_name FROM tbl_name WHERE col_name > 0;",
                $this->tbl->getComando());
    }
    
    public function testGroupComHaving(){
        $this->tbl = new SelectData("users");
        $this->tbl->setCols(["user","MAX(salary)"]);
        $this->tbl->setHaving(["MAX(salary) > 10"]);
        $this->tbl->setGroup(["user"]);
        $this->assertEquals("SELECT user,MAX(salary) FROM users GROUP BY user".
                " HAVING MAX(salary) > 10;",$this->tbl->getComando());
    }
    
    public function testLimit(){
        $this->tbl = new SelectData("tbl");
        $this->tbl->setLimit(["5","10"]);
        $this->assertEquals("SELECT * FROM tbl LIMIT 5,10;",$this->tbl->getComando());
    }
}
