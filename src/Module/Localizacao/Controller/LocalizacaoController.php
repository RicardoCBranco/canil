<?php
namespace CasteloBranco\Canil\Module\Localizacao\Controller;
use CasteloBranco\Canil\Interfaces\IController;
use CasteloBranco\Canil\Module\Localizacao\Model\Localizacao;
use CasteloBranco\Canil\Module\Localizacao\Model\LocalizacaoTabela;
/**
 * Description of LocalizacaoController
 *
 * @author ricardo
 */
class LocalizacaoController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $classe = \CasteloBranco\Canil\Factory\Creator::
                    factoryMethod(Localizacao::class,
                    filter_input_array(INPUT_POST));
            LocalizacaoTabela::insert($classe);
            header("location:index.php");
        }
    }

    public function deleteAction() {
        LocalizacaoTabela::delete(filter_input_array(INPUT_GET));
        header("location:index.php");
    }

    public function editAction() {
        $localizacao = \CasteloBranco\Canil\Factory\Creator::
                factoryMethod(Localizacao::class, filter_input_array(INPUT_GET));
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $classe = \CasteloBranco\Canil\Factory\Creator::
                    factoryMethod(Localizacao::class, filter_input_array(INPUT_POST));
            LocalizacaoTabela::update($localizacao, $classe);
            header("location:index.php");
        }
        return array(
          "localizacao" => $localizacao,
        );
    }

    public function indexAction() {
        $tabela = LocalizacaoTabela::findAll();
        return array(
          "localizacao" => $tabela
        );
    }

}
