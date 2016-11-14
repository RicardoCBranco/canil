<?php
namespace CasteloBranco\Canil\Tests\SqlCreate;
use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Description of ComanderTest
 *
 * @author Antonio Ricardo Andrade Castelo Branco
 */
class ComandoSqlTest extends PHPUnit{
    private $cmd;
    public function setUp() {
        $this->cmd = new \CasteloBranco\Canil\SqlCreate\ComandoSql("canino", "id_canino");
    }
    
    public function testSelect(){
        $this->assertEquals("SELECT * FROM canino;", $this->cmd->select());
    }
    
    public function testInsert(){
        $this->assertEquals("INSERT INTO canino(id_canino,nome_canino) VALUES (:id_canino,:nome_canino);",
        $this->cmd->insert(["id_canino","nome_canino"]));
    }
    
    public function testUpdate(){
        $this->assertEquals("UPDATE canino SET nome_canino=:nome_canino WHERE id_canino LIKE :id_canino;",
                $this->cmd->update(["nome_canino"],["id_canino"]));
    }
    
    public function testDelete(){
        $this->assertEquals("DELETE FROM canino WHERE id_canino LIKE :id_canino;",
                $this->cmd->delete(["id_canino"]));
    }
    
    public function testSelectComWhere(){
        $this->cmd->setBusca(["id_raca","sexo"]);
        $this->assertEquals("SELECT * FROM canino WHERE id_raca LIKE :id_raca AND sexo LIKE :sexo;",
                $this->cmd->select());
    }
    
    public function testUpdateComWhere(){
        $this->assertEquals("UPDATE canino SET cor=:cor,origem=:origem WHERE id_raca LIKE :id_raca AND sexo LIKE :sexo;",
                $this->cmd->update(["cor","origem"],["id_raca","sexo"]));
    }
    
    public function testDeleteComDoisCriterios(){
        $this->assertEquals("DELETE FROM canino WHERE id_raca LIKE :id_raca AND sexo LIKE :sexo;",
                $this->cmd->delete(["id_raca","sexo"]));
    }
    
    public function testGroupBy(){
        $this->cmd->setGroup(["sexo"]);
        $this->assertEquals("SELECT * FROM canino GROUP BY sexo;", $this->cmd->select());
    }
    
    public function testHaving(){
        $this->cmd->setHaving(["COUNT(sexo)"],["id"]);
        $this->assertEquals("SELECT COUNT(*) FROM canino GROUP BY id HAVING COUNT(sexo);",
                $this->cmd->select(["COUNT(*)"]));
    }
    
    public function testDoisHavings(){
        $this->cmd->setHaving(["COUNT(sexo)","data_nascimento > NOW()"], ["data_nascimento"]);
        $this->assertEquals("SELECT COUNT(*) FROM canino GROUP BY data_nascimento HAVING COUNT(sexo) AND data_nascimento > NOW();",
                $this->cmd->select(["COUNT(*)"]));
    }
    
    public function testOrderBy(){
        $this->cmd->setOrder(["data_nascimento ASC"]);
        $this->assertEquals("SELECT * FROM canino ORDER BY data_nascimento ASC;",
                $this->cmd->select());
    }
    
    public function testDoisOrder(){
        $this->cmd->setOrder(["data_nascimento ASC", "sexo DESC"]);
        $this->assertEquals("SELECT * FROM canino ORDER BY data_nascimento ASC,sexo DESC;",
                $this->cmd->select());
    }
    
    public function testInnerJoin(){
        $this->cmd->setJoin("INNER", "canino",'id_canino', "atividade_canino", "id_canino");
        $this->assertEquals("SELECT * FROM canino INNER JOIN atividade_canino ON"
                . "(canino.id_canino=atividade_canino.id_canino);", $this->cmd->select());
    }
}
