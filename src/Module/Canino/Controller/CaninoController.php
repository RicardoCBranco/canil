<?php
namespace CasteloBranco\Canil\Module\Canino\Controller;

/**
 * Description of CaninoController
 *
 * @author Ricardo
 */
ini_set("display_errors",1);
error_reporting(E_ALL);
class CaninoController implements \CasteloBranco\Canil\Interfaces\IController {  
    public function addAction() {
        $raca = \CasteloBranco\Canil\Module\Raca\Model\RacaTabela::findAll();
        $pessoa = \CasteloBranco\Canil\Module\Pessoa\Model\PessoaTabela::findAll();
        if(filter_input(INPUT_SERVER,"REQUEST_METHOD")=="POST"){
            $classe = \CasteloBranco\Canil\Factory\Creator::
                    factoryMethod(\CasteloBranco\Canil\Module\Canino\Model\Canino::class,
                        filter_input_array( INPUT_POST));
            \CasteloBranco\Canil\Module\Canino\Model\CaninoTabela::insert($classe);
            header("location:index.php");
        }
        return array(
          "racas"  => $raca,
          "pessoa" => $pessoa,
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $canino = \CasteloBranco\Canil\Module\Canino\Model\CaninoTabela::
                find(filter_input_array(INPUT_GET));
        $raca = \CasteloBranco\Canil\Module\Raca\Model\RacaTabela::findAll();
        $pessoa = \CasteloBranco\Canil\Module\Pessoa\Model\PessoaTabela::findAll();
        
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD")=="POST"){
            $classePos = \CasteloBranco\Canil\Factory\Creator::
                    factoryMethod(\CasteloBranco\Canil\Module\Canino\Model\Canino::class
                            , filter_input_array(INPUT_POST));
            \CasteloBranco\Canil\Module\Canino\Model\CaninoTabela::update($canino, $classePos);
            header("location:index.php");
        }
        return array(
          "canino" => $canino,
          "racas" => $raca,
          "pessoa" => $pessoa,
        );
    }

    public function indexAction() {
        $tab = new \CasteloBranco\Canil\Module\Canino\Model\CaninoTabela();
        $dados = $tab->findAll();
        return array(
          "caninos"  => $dados
        );
    }

}
