<?php
namespace CasteloBranco\Canil\Module\Pessoa\Controller;
use CasteloBranco\Canil\Interfaces\IController;
/**
 * Description of PessoaController
 *
 * @author Ricardo
 */
class PessoaController implements IController{
    public function addAction() {
        $perfil = \CasteloBranco\Canil\Module\Perfil\Model\PerfilTabela::findAll();
        if(filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST'){
            $classe = \CasteloBranco\Canil\Factory\Creator::
                    factoryMethod(\CasteloBranco\Canil\Module\Pessoa\Model\Pessoa::class,
                    filter_input_array(INPUT_POST));
            $classe->setSenha(md5(filter_input(INPUT_POST,"senha")));
            \CasteloBranco\Canil\Module\Pessoa\Model\PessoaTabela::insert($classe);
            header("location:index.php");
        }
        return array(
            "perfil" => $perfil
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $pessoa = \CasteloBranco\Canil\Module\Pessoa\Model\PessoaTabela
                ::find(filter_input_array(INPUT_GET));
        $perfil = \CasteloBranco\Canil\Module\Perfil\Model\PerfilTabela::findAll();
        
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $classe = \CasteloBranco\Canil\Factory\Creator::
                    factoryMethod(\CasteloBranco\Canil\Module\Pessoa\Model\Pessoa::class, filter_input_array(INPUT_POST));
            $classe->setSenha(md5(filter_input(INPUT_POST, "senha")));
            \CasteloBranco\Canil\Module\Pessoa\Model\PessoaTabela::update($pessoa, $classe);
            header("location:index.php");
        }
        return array(
            "pessoa" => $pessoa,
            "perfil" => $perfil,
        );
    }

    public function indexAction() {
        $pessoas = \CasteloBranco\Canil\Module\Pessoa\Model\PessoaTabela::findAll();
        return array(
            "pessoas" => $pessoas,
        );
    }
    
    public function geraCpf($str){
        $cpf = str_split($str,3);
        return $cpf[0].".".$cpf[1].".".$cpf[2]."-".$cpf[3];
    }

}
