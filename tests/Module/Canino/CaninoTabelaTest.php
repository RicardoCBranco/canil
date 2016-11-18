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
        $tab = $this->table->findAll();
        $this->assertInternalType("array", $tab);
    }
    
    public function testInsert(){
        $dados = ["nome_canino"=>"Nuno","data_nascimento"=>"2002-1-1","pedigree"=>"",
            "microchip" => "","origem" =>"Cria Propria","sexo" => "Macho","id_raca"=>"1"
            ,"cpf"=>"11111111111","cor"=>"Capa Preta"];
        $classe = new \CasteloBranco\Canil\Module\Canino\Model\Canino($dados);
        $tab = new CaninoTabela();
        $this->assertEquals(1, $tab->insert($classe));
    }
}
