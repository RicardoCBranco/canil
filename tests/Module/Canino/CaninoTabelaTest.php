<?php
namespace CasteloBranco\Canil\Tests\Module\Canino;
use PHPUnit_Framework_TestCase as PHPUnit;
use CasteloBranco\Canil\Module\Canino\Model\CaninoTabela;
/**
 * Description of CaninoTabelaTest
 *
 * @author Ricardo
 */
class CaninoTabelaTest extends PHPUnit{
    private $table;
    
    public function setUp() {
        $this->table = new CaninoTabela();
    }
    
    public function testFindAll(){
        $this->assertInternalType("array", $this->table->findAll());
    }
}
