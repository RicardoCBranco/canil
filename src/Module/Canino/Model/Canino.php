<?php
namespace CasteloBranco\Canil\Module\Canino\Model;
use CasteloBranco\Canil\Factory\Product;
/**
 * Description of Canino
 *
 * @author ricardo
 */
class Canino extends Product{
    private $idCanino;
    private $nomeCanino;
    private $dataNascimento;
    private $pedigree;
    private $origem;
    private $sexo;
    private $idRaca;
    private $idBox;
    private $cpf;
    private $cor;
    
    public function __construct(array $data) {
        $this->setIdCanino(isset($data['id_canino'])?$data['id_canino']:0)
                ->setCor($data['cor'])
                ->setCpf($data['cpf'])
                ->setDataNascimento($data['data_nascimento'])
                ->setIdBox($data['id_box'])
                ->setNomeCanino($data['nome_canino'])
                ->setOrigem($data['origem'])
                ->setPedigree($data['pedigree'])
                ->setSexo($data['sexo']);
    }


    public function getIdCanino() {
        return $this->idCanino;
    }

    public function getNomeCanino() {
        return $this->nomeCanino;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function getPedigree() {
        return $this->pedigree;
    }

    public function getOrigem() {
        return $this->origem;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getIdRaca() {
        return $this->idRaca;
    }

    public function getIdBox() {
        return $this->idBox;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getCor() {
        return $this->cor;
    }

    public function setIdCanino($idCanino) {
        $this->idCanino = $idCanino;
        return $this;
    }

    public function setNomeCanino($nomeCanino) {
        $this->nomeCanino = $nomeCanino;
        return $this;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    public function setPedigree($pedigree) {
        $this->pedigree = $pedigree;
        return $this;
    }

    public function setOrigem($origem) {
        $this->origem = $origem;
        return $this;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
        return $this;
    }

    public function setIdRaca($idRaca) {
        $this->idRaca = $idRaca;
        return $this;
    }

    public function setIdBox($idBox) {
        $this->idBox = $idBox;
        return $this;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
        return $this;
    }

    public function setCor($cor) {
        $this->cor = $cor;
        return $this;
    }
    
    public function getParams() {
        return array(
          "id_canino" => \PDO::PARAM_INT,
          "cor" => \PDO::PARAM_INT,
          "cpf" => \PDO::PARAM_STR,
          "data_nascimento" => \PDO::PARAM_STR,
          "id_box" => \PDO::PARAM_INT,
          "id_raca" => \PDO::PARAM_INT,
          "nome_canino" => \PDO::PARAM_STR,
          "origem" => \PDO::PARAM_INT,
          "pedigree" => \PDO::PARAM_STR,
          "sexo" => \PDO::PARAM_INT,
        );
    }

    public function getValues() {
        return array(
          "id_canino" => $this->getIdCanino(),
          "cor" => $this->getCor(),
          "cpf" => $this->getCpf(),
          "data_nascimento" => $this->getDataNascimento(),
          "id_box" => $this->getIdBox(),
          "id_raca" => $this->getIdRaca(),
          "nome_canino" => $this->getNomeCanino(),
          "origem" => $this->getOrigem(),
          "pedigree" => $this->getPedigree(),
          "sexo" => $this->getSexo(),
        );
    }

}
