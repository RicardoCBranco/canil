<?php
namespace CasteloBranco\Canil\Chain\Table;
use CasteloBranco\Canil\Chain\Implement\ISqlData;

/**
 * Description of DeleteData
 *
 * @author Ricardo
 */
class DeleteData implements ISqlData{
    private $tblName;
    private $cols = array();
    private $join = array();
    private $where = array();
    private $limit = array();
    private $order = array();
    
    public function __construct($tblName) {
        $this->tblName = $tblName;
    }

    public function getComando() {
        $cmd = "DELETE".$this->space($this->cols);
        $cmd .= substr($this->getCols(),0,-1);
        $cmd .=  " FROM $this->tblName".$this->space($this->join);
        $cmd .= substr($this->getJoin(),0,-1).$this->space($this->where);
        $cmd .= $this->getWhere().$this->space($this->order);
        $cmd .= substr($this->getOrder(),0,-1).$this->space($this->limit);
        $cmd .= substr($this->getLimit(),0,-1);
        $cmd .= ";";
        return $cmd;
    }    

    public function setCols(array $cols) {
        $this->cols = array_merge($this->cols, $cols);
    }

    public function setVals(array $vals) {
        
    }
    
    public function setJoin($join, $table1, $table2 = NULL, $colum1 = NULL,$colum2 = NULL){
        array_push($this->join,
        ["t1"=>$table1,"t2"=>$table2,"c1"=>$colum1,"c2"=>$colum2, "join"=>$join]);
    }
    
    public function setWhere(array $where){
        $this->where = array_merge($this->where,$where);
    }
    
    public function setLimit(array $limit){
        $this->limit = array_merge($this->limit,$limit);
    }
    
    public function setOrder($column, $order = NULL){
        array_push($this->order, ["c"=>$column,"o"=>$order]);
    }
    
    private function getCols(){
        $cols = NULL;
        if(count($this->cols)>0){
            foreach ($this->cols as $row){
                $cols .= $row.",";
            }
        }
        if(strlen($cols)>0){
            return $cols;
        }
        return $cols;
    }
    
    private function getJoin(){
        $join = NULL;
        if(count($this->join)>0){
            foreach ($this->join as $str){
                $join .= $str["join"]." JOIN ".$str['t1'];
                $join .= is_null($str["t2"])?NULL:" ON(".$str['t1'].".".$str['c1']
                        ."=".$str['t2'].".".$str['c2'].")";
                $join .= $this->space($this->join[key($this->join)+1]);
            }
        }
        return $join;
    }
    
    private function getWhere(){
        $where = NULL;
        $termos = NULL;
        if(count($this->where)>0){
            $where .= "WHERE ";
            foreach ($this->where as $str){
                $termos .= "$str AND ";
            }
            $where .= substr($termos,0,-5);
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
    
    private function space(array $var){
        if(count($var)>0){
            return " ";
        }
        return NULL;
    }
}
