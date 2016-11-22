<?php
namespace CasteloBranco\Canil\Module\Perfil\Controller;
use CasteloBranco\Canil\Interfaces\IController;
/**
 * Description of PerfilController
 *
 * @author Ricardo
 */
class PerfilController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $classe = \CasteloBranco\Canil\Factory\Creator::
                    factoryMethod(\CasteloBranco\Canil\Module\Perfil\Model\Perfil::class,
                    filter_input_array(INPUT_POST));
            \CasteloBranco\Canil\Module\Perfil\Model\PerfilTabela::insert($classe);
            header("location:index.php");
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $perfil = \CasteloBranco\Canil\Module\Perfil\Model\PerfilTabela::
                find(filter_input_array(INPUT_GET));
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $classe = \CasteloBranco\Canil\Factory\Creator::
                    factoryMethod(\CasteloBranco\Canil\Module\Perfil\Model\Perfil::class,
                    filter_input_array(INPUT_POST));
            \CasteloBranco\Canil\Module\Perfil\Model\PerfilTabela::update($perfil, $classe);
            header("location:index.php");
        }
        return array(
            "perfil" => $perfil
        );
    }

    public function indexAction() {
        $tab = \CasteloBranco\Canil\Module\Perfil\Model\PerfilTabela::findAll();
        return array(
            "perfil" => $tab,
        );
    }

}
