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
    
    public function testInsert(){
        $dados = ["nome_canino"=>"Nuno","data_nascimento"=>"2002-1-1","pedigree"=>NULL,
            "microchip" => NULL,"origem" =>"1","sexo" => "1","id_raca"=>"1",
            "id_box"=>"1","cpf"=>"1","cor"=>"1"];
        $classe = new \CasteloBranco\Canil\Module\Canino\Model\Canino($dados);
        $tab = new CaninoTabela();
        $this->assertInternalType("int", $tab->insert($classe));
    }
}
