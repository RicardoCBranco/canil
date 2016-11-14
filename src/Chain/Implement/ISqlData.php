<?php
namespace CasteloBranco\Canil\Chain\Implement;
/**
 *
 * @author Ricardo
 */
interface ISqlData {
    public function __construct($tblName);
    public function getComando();
    public function setCols(array $cols);
    public function setVals(array $vals);
}
