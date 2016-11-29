<?php
namespace CasteloBranco\Canil\Module\Canil\Model;
use CasteloBranco\Canil\Factory\Product;
/**
 * Description of Canil
 *
 * @author ricardo
 */
class Canil extends Product{
    private $idCanil;
    private $nomeCanil;
    private $endereco;
    private $bairro;
    private $cidade;
    private $uf;
    
    public function __construct(array $dados) {
        $this->setIdCanil(isset($dados["id_localizacao"])?$dados["id_localizacao"]:0)
             ->setNomeCanil($dados["nome_canil"])
             ->setBairro($dados["bairro"])
             ->setCidade($dados["cidade"])
             ->setEndereco($dados["endereco"])
             ->setUf($dados["uf"]);
    }
    
    public function getIdCanil() {
        return $this->idCanil;
    }
    
    public function getNomeCanil() {
        return $this->nomeCanil;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getUf() {
        return $this->uf;
    }

    public function setIdCanil($idCanil) {
        $this->idCanil = filter_var($idCanil,FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }

    public function setNomeCanil($nomeCanil) {
        $this->nomeCanil = filter_var($nomeCanil,FILTER_SANITIZE_STRING);
        return $this;
    }

        public function setEndereco($endereco) {
        $this->endereco = filter_var($endereco,FILTER_SANITIZE_STRING);
        return $this;
    }

    public function setBairro($bairro) {
        $this->bairro = filter_var($bairro,FILTER_SANITIZE_STRING);
        return $this;
    }

    public function setCidade($cidade) {
        $this->cidade = filter_var($cidade,FILTER_SANITIZE_STRING);
        return $this;
    }

    public function setUf($uf) {
        $this->uf = filter_var($uf,FILTER_SANITIZE_STRING);
        return $this;
    }

    public function getParams() {
        return array(
            "id_canil" => \PDO::PARAM_INT,
            "nome_canil" => \PDO::PARAM_STR,
            "bairro" => \PDO::PARAM_STR,
            "cidade" => \PDO::PARAM_STR,
            "endereco" => \PDO::PARAM_STR,
            "uf" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "id_canil" => $this->getIdCanil(),
            "nome_canil" => $this->getNomeCanil(),
            "bairro" => $this->getBairro(),
            "cidade" => $this->getCidade(),
            "endereco" => $this->getEndereco(),
            "uf" => $this->getUf()
        );
    }
}
