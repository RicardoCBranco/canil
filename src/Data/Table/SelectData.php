<?php
namespace CasteloBranco\Canil\Data\Table;
/**
 * Description of SelectData
 *
 * @author Ricardo
 */
class SelectData extends \CasteloBranco\Canil\Data\DataSet{
    private $table;
    private $concat = array();
    private $cols = array();
    private $join = array();
    private $order = array();
    private $group = array();
    private $where = array();
    private $having = array();
    private $limit = array();
    
    public function __construct($tblName) {
        $this->table = $tblName;
    }

    public function getComando() {
        $cmd = "SELECT ".substr($this->getCols(),0,-1)." FROM $this->table";
        $cmd .= $this->getJoin().$this->space($this->where);
        $cmd .= $this->getWhere().$this->space($this->group);
        $cmd .= substr($this->getGroup(),0,-1).$this->space($this->having);
        $cmd .= $this->getHaving().$this->space($this->order);
        $cmd .= substr($this->getOrder(),0,-1).$this->space($this->limit);
        $cmd .= substr($this->getLimit(),0,-1).";";        
        return $cmd;
    }
    
    private function getCols(){
        $cols = NULL;
        if(count($this->cols)>0){
            foreach ($this->cols as $row){
                $cols .= $row.",";
            }
        }
        $cols .= $this->getConcat();
        if(strlen($cols)>0){
            return $cols;
        }
        return "* ";
    }
    
    private function getConcat(){
        $concat = NULL;
        $apelido = NULL;
        $campos = NULL;
        if(count($this->concat)>0){
            foreach ($this->concat as $key => $str){
                $campos .= "CONCAT(".implode(",",$str)."),";
                $apelido = $key;
            }
            if(!is_int($apelido)){
                $concat .= substr($campos,0,-1)." AS ".$apelido.",";
            }
        }
        return $concat;
    }
    
    private function getJoin(){
        $join = NULL;
        if(count($this->join)>0){
            foreach ($this->join as $key => $str){
                $join .= " ".$key." JOIN ".$str['t1']." ON(".$str['t1'].".".$str['c1']
                        ."=".$str['t2'].".".$str['c2'].")";
            }
        }
        return $join;
    }
    
     private function getOrder(){
        $order = NULL;
        if(count($this->order)>0){
            $order .= "ORDER BY ";
            foreach ($this->order as $str){
                $order .= $str['c'];
                if(!is_null($str['o'])){
                    $order .= " ".$str['o'];
                }
                $order .= ",";
            }
        }
        return $order;
    }
    
    private function getGroup(){
        $group = NULL;
        if(count($this->group)>0){
            $group .= "GROUP BY ";
            foreach ($this->group as $str){
                $group .= $str.",";
            }
        }
        return $group;
    }
    
    private function getHaving(){
        $having = NULL;
        $termos = NULL;
        if(count($this->having)>0){
            $having .= "HAVING ";
            foreach ($this->having as $str){
                $termos .= "$str AND";
            }
            $having .= substr($termos,0,-4);
        }
        return $having;
    }
    
    private function getWhere(){
        $where = NULL;
        $termos = NULL;
        if(count($this->where)>0){
            $where .= "WHERE ";
            foreach ($this->where as $str){
                $termos .= "$str AND";
            }
            $where .= substr($termos,0,-4);
        }
        return $where;
    }
    
    private function getLimit(){
        $limit = NULL;
        if(count($this->limit)>0){
            $limit .= "LIMIT ";
            foreach ($this->limit as $str){
                $limit .= $str.",";
            }
        }
        return $limit;
    }
    
    private function space(array $var){
        if(count($var)>0){
            return " ";
        }
        return NULL;
    }

    public function setCols(array $cols) {
        $this->cols = array_merge($this->cols, $cols);
    }

    public function setVals(array $vals) {
        
    }
    
    public function setConcat(array $termos, $apelido = NULL){
        if(is_null($apelido)){
            array_push($this->concat, $apelido);
        }
        $this->concat[$apelido] = $termos;
    }
    
    public function setJoin($join, $table1, $colum1, $table2, $colum2){
        $this->join[$join] = ["t1"=>$table1,"t2"=>$table2,"c1"=>$colum1,"c2"=>$colum2];
    }
    
    public function setOrder($column, $order = NULL){
        array_push($this->order, ["c"=>$column,"o"=>$order]);
    }
    
    public function setGroup(array $group){
        $this->group = array_merge($this->group,$group);
    }
    
    public function setHaving(array $having){
        $this->having = array_merge($this->having, $having);
    }
    
    public function setWhere(array $where){
        $this->where = array_merge($this->where,$where);
    }
    
    public function setLimit(array $limit){
        $this->limit = array_merge($this->limit,$limit);
    }
    
    public function row($sql = NULL) {
        $sql .= $this->getComando();
        return parent::row($sql);
    }

    public function table($sql = NULL) {
        $sql .= $this->getComando();
        return parent::table($sql);
    }
}