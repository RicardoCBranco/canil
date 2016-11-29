<?php
namespace CasteloBranco\Canil\Module\Canil\Controller;
use CasteloBranco\Canil\Interfaces\IController;
use CasteloBranco\Canil\Module\Canil\Model\Canil;
use CasteloBranco\Canil\Module\Canil\Model\CanilTabela;
/**
 * Description of LocalizacaoController
 *
 * @author ricardo
 */
class CanilController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $classe = \CasteloBranco\Canil\Factory\Creator::
                    factoryMethod(Canil::class,
                    filter_input_array(INPUT_POST));
            CanilTabela::insert($classe);
            header("location:index.php");
        }
    }

    public function deleteAction() {
        CanilTabela::delete(filter_input_array(INPUT_GET));
        header("location:index.php");
    }

    public function editAction() {
        $canil = CanilTabela::find(filter_input_array(INPUT_GET));
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $classe = \CasteloBranco\Canil\Factory\Creator::
                    factoryMethod(Canil::class, filter_input_array(INPUT_POST));
            CanilTabela::update($canil, $classe);
            header("location:index.php");
        }
        return array(
          "canil" => $canil,
        );
    }

    public function indexAction() {
        $tabela = CanilTabela::findAll();
        return array(
          "canil" => $tabela
        );
    }

}
