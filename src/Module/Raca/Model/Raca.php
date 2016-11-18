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
        $this->setContent($dados["content"]);
        $this->setMime($dados["mime"]);
        $this->setNomeRaca($dados["nome_raca"]);
        $this->setPadraoFCI($dados["padrao_fci"]);
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

    public function getContent() {
        return $this->content;
    }

    public function getMime() {
        return $this->mime;
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

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function setMime($mime) {
        $this->mime = filter_var($mime,FILTER_SANITIZE_STRING);
        return $this;
    }

    public function getParams() {
        return array(
            "id_raca" => \PDO::PARAM_INT,
            "nome_raca" => \PDO::PARAM_STR,
            "padao_fci" => \PDO::PARAM_INT,
            "id_padrao" => \PDO::PARAM_INT,
            "content" => \PDO::PARAM_LOB,
            "mime" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "id_raca" => $this->getIdRaca(),
            "nome_raca" => $this->getNomeRaca(),
            "padao_fci" => $this->getPadraoFCI(),
            "id_padrao" => $this->getPadraoFCI(),
            "content" => $this->getContent(),
            "mime" => $this->getMime()
        );
    }

}
