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
            //header("location:index.php");
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        
    }

    public function indexAction() {
        $tab = \CasteloBranco\Canil\Module\Raca\Model\RacaTabela::findAll();
        return array(
            "raca" => $tab
        );
    }

}
