<?php
namespace CasteloBranco\Canil\Module\Localizacao\Model;
use CasteloBranco\Canil\Factory\Product;
/**
 * Description of Localizacao
 *
 * @author ricardo
 */
class Localizacao extends Product{
    private $idLocalizacao;
    private $endereco;
    private $bairro;
    private $cidade;
    private $uf;
    
    public function __construct(array $dados) {
        $this->setIdLocalizacao(isset($dados["id_localizacao"])?$dados["id_localizacao"]:0)
             ->setBairro($dados["bairro"])
             ->setCidade($dados["cidade"])
             ->setEndereco($dados["endereco"])
             ->setUf($dados["uf"]);
    }
    
    public function getIdLocalizacao() {
        return $this->idLocalizacao;
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

    public function setIdLocalizacao($idLocalizacao) {
        $this->idLocalizacao = filter_var($idLocalizacao,FILTER_SANITIZE_NUMBER_INT);
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
            "id_localizacao" => \PDO::PARAM_INT,
            "bairro" => \PDO::PARAM_STR,
            "cidade" => \PDO::PARAM_STR,
            "endereco" => \PDO::PARAM_STR,
            "uf" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "id_localizacao" => $this->getIdLocalizacao(),
            "bairro" => $this->getBairro(),
            "cidade" => $this->getCidade(),
            "endereco" => $this->getEndereco(),
            "uf" => $this->getUf()
        );
    }
}
