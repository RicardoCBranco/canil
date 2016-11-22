<?php
namespace CasteloBranco\Canil\Module\Perfil\Model;
use CasteloBranco\Canil\Factory\Product;
/**
 * Description of Perfil
 *
 * @author Ricardo
 */
class Perfil extends Product{
    private $idPerfil;
    private $tipoPerfil;
    
    public function __construct($data) {
        $this->setIdPerfil(isset($data['id_perfil'])?$data['id_perfil']:0)
             ->setTipoPerfil($data['tipo_perfil']);
    }

    
    public function getIdPerfil() {
        return $this->idPerfil;
    }

    public function getTipoPerfil() {
        return $this->tipoPerfil;
    }

    public function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
        return $this;
    }

    public function setTipoPerfil($tipoPerfil) {
        $this->tipoPerfil = $tipoPerfil;
        return $this;
    }
    
    public function getParams() {
        return array(
            "id_perfil" => \PDO::PARAM_INT,
            "tipo_perfil" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "id_perfil" => $this->getIdPerfil(),
            "tipo_perfil" => $this->getTipoPerfil()
        );
    }

}
