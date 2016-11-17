<?php
namespace CasteloBranco\Canil\Module\Canino\Controller;

/**
 * Description of CaninoController
 *
 * @author Ricardo
 */
class CaninoController implements \CasteloBranco\Canil\Interfaces\IController {  
    public function addAction() {
        
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        
    }

    public function indexAction() {
        $tab = new \CasteloBranco\Canil\Module\Canino\Model\CaninoTabela();
        $dados = $tab->findAll();
        return array(
          "caninos"  => $dados
        );
    }

}
