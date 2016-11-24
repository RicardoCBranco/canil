<?php
namespace CasteloBranco\Canil\Module\Raca\Controller;
use CasteloBranco\Canil\Interfaces\IController;
/**
 * Description of RacaController
 *
 * @author ricardo
 */
class RacaController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $classe = \CasteloBranco\Canil\Factory\Creator::
                    factoryMethod(\CasteloBranco\Canil\Module\Raca\Model\Raca::class,
                    filter_input_array(INPUT_POST));
            \CasteloBranco\Canil\Module\Raca\Model\RacaTabela::insert($classe);
            header("location:index.php");
        }
    }

    public function deleteAction() {        
            \CasteloBranco\Canil\Module\Raca\Model\RacaTabela::
                delete(filter_input_array(INPUT_GET));
                header("location:index.php");
    }

    public function editAction() {
        $raca = \CasteloBranco\Canil\Factory\Creator::
                factoryMethod(\CasteloBranco\Canil\Module\Raca\Model\Raca::class,
                \CasteloBranco\Canil\Module\Raca\Model\RacaTabela::
                        find(filter_input_array(INPUT_GET)));
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $classe = \CasteloBranco\Canil\Factory\Creator::
                    factoryMethod(\CasteloBranco\Canil\Module\Raca\Model\Raca::class
                            , filter_input_array(INPUT_POST));
            \CasteloBranco\Canil\Module\Raca\Model\RacaTabela::update($raca, $classe);
            header("location:index.php");
        }
        return array(
            "raca" => $raca,
        );
    }

    public function indexAction() {
        $tab = \CasteloBranco\Canil\Module\Raca\Model\RacaTabela::findAll();
        return array(
            "raca" => $tab
        );
    }

}
