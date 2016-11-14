<?php
namespace CasteloBranco\Canil\Tests\Data;
use PHPUnit_Extensions_Database_TestCase as PHPUnit;
use CasteloBranco\Canil\Interfaces\IConnect;
/*
 * Para rodar o teste digite e um terminal ./vendor/bin/phpunit --colors tests/
 * Data/ConexaoTest
 */

/**
 * Description of ConexaoTest
 *
 * @author Antonio Ricardo Andrade Castelo Branco
 */
class ConexaoTest extends PHPUnit{
    private static $pdo = null;
    private $con = null;
    
    protected function getConnection() {    
        if(is_null($this->con)){
            if(is_null(self::$pdo)){
                self::$pdo = new \PDO(IConnect::DSN,  IConnect::USER, IConnect::PSWD);
            }
            $this->con = $this->createDefaultDBConnection(self::$pdo,  IConnect::DBNAME);
        }
        return $this->con;
    }
    
    protected function getDataSet() {
          return $this->createMySQLXMLDataSet('tests/Data/canil.xml');
    }
    
    public function testMultiplasTabelas(){
        $actual = $this->getConnection()->createDataSet(array("acompanhamento","atividade",
            "atividade_canino","box","canino","caracteristica_medicamento","categoria",
            "clima","comida","desempenho","estado","exercicio","exercicio_atividade",
            "exercicio_treinamento","fezes","forma_farmaceutica","fotos","funcionalidade",
            "localizacao","material","menu","origem","pais","parentesco","perfil",
            "perfil_funcionalidade","pessoa","raca","sexo","telefone_contato",
            "terreno","tipo_material","trabalho","tipo_medicamento","trabalho_canino",
            "treinamento","urina","veterinaria","veterinaria_medicamento","via_administracao"));
        $expected = $this->getDataSet();
        $this->assertDataSetsEqual($expected, $actual);
    }
    
    public function testTabelaCanino(){
        $filter = new \PHPUnit_Extensions_Database_DataSet_DataSetFilter($this->getDataSet());
        $filter->addIncludeTables(array('canino'));
        $filter->setIncludeColumnsForTable('canino',array('id_canino', 'nome_canino',
            'data_nascimento'));
    }
}
