<?php
namespace CasteloBranco\Canil\Module\Raca\Model;

/**
 * Description of Raca
 *
 * @author Ricardo
 */
class Raca extends \CasteloBranco\Canil\Factory\Product{
    private $idRaca;
    private $nomeRaca;
    
    public function __construct(array $dados) {
        $this->setIdRaca(isset($dados["id_raca"])?$dados["id_raca"]:0)
             ->setNomeRaca($dados["nome_raca"]);
    }

    public function getIdRaca() {
        return $this->idRaca;
    }

    public function getNomeRaca() {
        return $this->nomeRaca;
    }

    public function setIdRaca($idRaca) {
        $this->idRaca = filter_var($idRaca,FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }

    public function setNomeRaca($nomeRaca) {
        $this->nomeRaca = filter_var($nomeRaca,FILTER_SANITIZE_STRING);
        return $this;
    }

    public function getParams() {
        return array(
            "id_raca" => \PDO::PARAM_INT,
            "nome_raca" => \PDO::PARAM_STR,
        );
    }

    public function getValues() {
        return array(
            "id_raca" => $this->getIdRaca(),
            "nome_raca" => $this->getNomeRaca(),
        );
    }

}
