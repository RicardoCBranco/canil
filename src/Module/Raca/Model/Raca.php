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
    private $padraoFCI;
    private $content;
    private $mime;
    
    public function __construct(array $dados) {
        $this->setIdRaca(isset($dados["id_raca"])?$dados["id_raca"]:0);
        $this->setNomeRaca($dados["nome_raca"]);
        $this->setPadraoFCI((strlen($dados["padrao_fci"])>0)?$dados["padrao_fci"]:NULL);
    }

    public function getIdRaca() {
        return $this->idRaca;
    }

    public function getNomeRaca() {
        return $this->nomeRaca;
    }

    public function getPadraoFCI() {
        return $this->padraoFCI;
    }

    public function setIdRaca($idRaca) {
        $this->idRaca = filter_var($idRaca,FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }

    public function setNomeRaca($nomeRaca) {
        $this->nomeRaca = filter_var($nomeRaca,FILTER_SANITIZE_STRING);
        return $this;
    }

    public function setPadraoFCI($padraoFCI) {
        $this->padraoFCI = filter_var($padraoFCI,FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }

    public function getParams() {
        return array(
            "id_raca" => \PDO::PARAM_INT,
            "nome_raca" => \PDO::PARAM_STR,
            "padrao_fci" => \PDO::PARAM_INT,
        );
    }

    public function getValues() {
        return array(
            "id_raca" => $this->getIdRaca(),
            "nome_raca" => $this->getNomeRaca(),
            "padrao_fci" => $this->getPadraoFCI(),
        );
    }

}
