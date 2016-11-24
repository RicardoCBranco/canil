<?php
namespace CasteloBranco\Canil\Data\Table;
/**
 * Description of InsertData
 *
 * @author Ricardo
 */
class InsertData extends \CasteloBranco\Canil\Data\DataSet{
    private $tblName;
    private $cols = array();
    
    public function __construct($tblName) {
        $this->tblName = $tblName;
    }
    
    public function getComando(){
        var_dump($this->values);
        $cmd = "INSERT INTO $this->tblName (";
        $cols = null;
        if(count($this->cols)>0){
            foreach ($this->cols as $row){
                $cols .= $row.",";
            }
            $cmd .= substr($cols,0,-1);
        }
        $cmd .= ") VALUES";
        $cmd .= str_replace("))",")",str_replace("((", "(",$this->getVals($this->values)));
        $cmd .= ";" ;
        return $cmd;
    }
    
    public function setCols(array $cols){
        $this->cols = $cols;
    }
    
    public function setVals(array $vals){
        $this->values = $vals;
    }
    
    private function getVals($arrayVals){
        $values = NULL;
        $cmd = "(";
        if(count($arrayVals)>0){
            foreach ($arrayVals as $key => $row){
                if(is_array($row)){
                   $values .= $this->getVals($row);
                }else{
                    $values .= ":$key";
                }
                $values .= ",";
            }
            $cmd .= substr($values,0,-1);            
        }
        $cmd .= ")";
        return $cmd;
    }
    
    public function execute($sql = NULL) {
        $sql .= $this->getComando();
        return parent::execute($sql);
    }
}
