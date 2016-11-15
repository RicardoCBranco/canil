<?php
namespace CasteloBranco\Canil\Chain\Table;
use \CasteloBranco\Canil\Chain\Implement\ISqlData;
/**
 * Description of InsertData
 *
 * @author Ricardo
 */
class InsertData implements ISqlData{
    private $tblName;
    private $cols = array();
    private $vals = array();
    
    public function __construct($tblName) {
        $this->tblName = $tblName;
    }
    
    public function getComando(){
        $cmd = "INSERT INTO $this->tblName (";
        $cols = null;
        if(count($this->cols)>0){
            foreach ($this->cols as $row){
                $cols .= $row.",";
            }
            $cmd .= substr($cols,0,-1);
        }
        $cmd .= ") VALUES";
        $cmd .= str_replace("))",")",str_replace("((", "(",$this->getVals($this->vals)));
        $cmd .= ";" ;
        return $cmd;
    }
    
    public function setCols(array $cols){
        $this->cols = $cols;
    }
    
    public function setVals(array $vals){
        $this->vals = $vals;
    }
    
    private function getVals($arrayVals){
        $values = NULL;
        $cmd = "(";
        if(count($arrayVals)>0){
            foreach ($arrayVals as $row){
                if(is_array($row)){
                   $values .= $this->getVals($row);
                }else{
                    $values .= ":$row";
                }
                $values .= ",";
            }
            $cmd .= substr($values,0,-1);            
        }
        $cmd .= ")";
        return $cmd;
    }
}
