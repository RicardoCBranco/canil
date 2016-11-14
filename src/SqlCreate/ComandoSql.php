<?php
namespace CasteloBranco\Canil\SqlCreate;

/**
 * Description of Comander
 *
 * @author Antonio Ricardo Andrade Castelo Branco
 */
class ComandoSql {
    private $tabela;
    private $id;
    private $join = array();
    private $busca;
    private $colunas;
    private $valores;
    private $having;
    private $group;
    private $order;
    
    public function __construct($tabela, $id) {
        $this->tabela = $tabela;
        $this->id = $id;
    }

    /*
     *Podem ser repassadas columas a serem exebidas através de um array ou simples-
     * mente pode-se pegar todas as colunas sem passar qualquer parametro para a
     * função.
     */
    public function select($colunas = []){
        $this->colunas = $colunas;
        $sql = "SELECT ";
        $sql .= $this->columns();
        $sql .= " FROM $this->tabela";
        $sql .= $this->getJoin();
        $sql .= $this->where();
        $sql .= $this->getGroup();
        $sql .= $this->getHaving();
        $sql .= $this->getOrder();
        $sql .= ";";
        return $sql;
    }
    /*
     * recebe um array com as colunas que terão os valores inseridos
     */
    public function insert(array $colunas){
       $this->colunas = $colunas;
       $sql = "INSERT INTO $this->tabela(";
       $sql .= $this->columns();
       $sql .= ") VALUES (";
       $sql .= $this->values();
       $sql .= ");";
       return $sql;
    }
    
    /*
     * Retorna um comando update com os valores baseados na coluna repassada no
     * array, deve ser lançado os critérios de busca.
     */
    public function update(array $colunas, array $criterios){
        $this->colunas = $colunas;
        $this->busca = $criterios;
        $sql = "UPDATE $this->tabela SET ";
        foreach ($this->colunas as $set){
            $sql .= $set."=:".$set.",";
        }
        $sql = substr($sql, 0, -1);
        $sql .= $this->where();
        $sql .= ";";
        return $sql;
    }
    /*
     * Retorna o comando de Delete com critérios baseados nas colunas repassadas
     * pelo array
     */
    public function delete(array $colunas){
        $this->busca = $colunas;
        $sql = "DELETE FROM $this->tabela";
        $sql .= $this->where();
        $sql .= ";";
        return $sql;
    }
    /*
     * Cria um where baseado no array com parametros repassados
     */
    public function setBusca(array $busca){
        $this->busca = $busca;
    }
    /*
     * Agrupa os dados baseados em array repassado
     */
    public function setGroup(array $group){
        $this->group = $group;
    }
    
    public function setHaving(array $having, array $group){
        $this->group = $group;
        $this->having = $having;
    }
    
    public function setJoin($join,$tabela1, $campo1, $tabela2,$campo2){
        $pos = end($this->join);
        $array = ["join"=>$join,"campo1"=> $campo1, 
            "campo2"=> $campo2,"tabela1" => $tabela1, "tabela2"=> $tabela2];
        $this->join[$pos++] = $array;
    }
    
    public function setOrder(array $order){
        $this->order = $order;
    }
    
    private function getGroup(){
        $group = null;
        if(count($this->group)>0){
            $group = " GROUP BY ";
            foreach ($this->group as $row){
              $group .= $row.",";
            }
            $group = substr($group, 0,-1);
        }
        return $group;
    }
    
    private function getJoin(){
        $join = null;
        if(count($this->join)>0){
            foreach ($this->join as $row){
                $join .= " ".$row["join"]." JOIN ".$row["tabela2"]." ON(".
                        $row["tabela1"].".".$row['campo1']."=".
                        $row["tabela2"].".".$row['campo2'].")";
            }
        }
        return $join;
    }
    
    private function getHaving(){
        $having = null;
        $cont = count($this->having);
        if($cont >0){
            $having = " HAVING ";
            foreach ($this->having as $key){
                $cont--;
                $having .= $key;
                if($cont >0){
                    $having .= " AND ";
                }
            }
        }
        return $having;
    }
    
    private function getOrder(){
        $order = null;
        if(count($this->order)>0){
            $order = " ORDER BY ";
            foreach ($this->order as $row){
                $order .= $row.",";
            }
            $order = substr($order,0,-1);
        }
        return $order;
    }
    
    private function columns(){
        $columns = null;
        if(count($this->colunas)>0){
            foreach ($this->colunas as $setters){
                $columns .= $setters.",";
            }
            $columns = substr($columns, 0,-1);
        }else{
            $columns = "*";
        }
        return $columns;
    }
    
    private function values(){
        $values = null;
        if(count($this->colunas)>0){
            foreach ($this->colunas as $setters){
                $values .= ":".$setters.",";
            }
            $values = substr($values, 0,-1);
        }
        return $values;
    }
    
    private function where(){
        $where = NULL;
        if(count($this->busca)>0){
            $where = " WHERE ";
            $cont = count($this->busca);
            foreach ($this->busca as $key){
                $cont--;
                $where .= $key." LIKE :".$key;
                if($cont >0){
                    $where .= " AND ";
                }
            }
        }
        return $where;
    }
}
