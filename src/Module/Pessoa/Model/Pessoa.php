<?php
namespace CasteloBranco\Canil\Module\Pessoa\Model;

/**
 * Description of Pessoa
 *
 * @author Ricardo
 */
class Pessoa extends \CasteloBranco\Canil\Factory\Product{
    private $cpf;
    private $email;
    private $nomePessoa;
    private $senha;
    private $idPerfil;
    
    public function __construct($dados) {
        $this->setCpf(isset($dados["cpf"])?$dados["cpf"]:0)
             ->setEmail($dados["email"])
             ->setIdPerfil(isset($dados["id_perfil"])?$dados["id_perfil"]:0)
             ->setNomePessoa($dados["nome_pessoa"])
             ->setSenha($dados["senha"]);
    }

    
    public function getCpf() {
        return $this->cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNomePessoa() {
        return $this->nomePessoa;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getIdPerfil() {
        return $this->idPerfil;
    }

    public function setCpf($cpf) {
        $this->cpf = filter_var(str_replace([".","-"], "", $cpf),
                FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setNomePessoa($nomePessoa) {
        $this->nomePessoa = $nomePessoa;
        return $this;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
        return $this;
    }

    public function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
        return $this;
    }
    
    public function getParams() {
        return array(
            "cpf" => \PDO::PARAM_INT,
            "email" => \PDO::PARAM_STR,
            "id_perfil" => \PDO::PARAM_INT,
            "senha" => \PDO::PARAM_STR,
            "nome_pessoa" => \PDO::PARAM_STR,            
        );
    }

    public function getValues() {
        return array(
            "cpf" => $this->getCpf(),
            "email" => $this->getEmail(),
            "id_perfil" => $this->getIdPerfil(),
            "senha" => $this->getSenha(),
            "nome_pessoa" => $this->getNomePessoa(),
        );
    }

}
