<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
            include_once '../../autoload.php';
            $ctrl = new CasteloBranco\Canil\Module\Canil\Controller\CanilController();
            $dados = $ctrl->editAction();
            $canil = $dados["canil"];
        ?>
        <link href="../../../public/css/principal.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form method="post" action="">
            <input type="hidden" name="id_canil" value="<?php echo $canil->getIdCanil(); ?>">
            <div>
                <label for="nome_canil">Nome do Canil</label>
                <input type="text" name="nome_canil" value="<?php echo $canil->getNomeCanil(); ?>">
            </div>
            <div>
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" value="<?php echo $canil->getEndereco(); ?>">
            </div>
            <div>
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" value="<?php echo $canil->getBairro(); ?>">
            </div>
            <div>
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" value="<?php echo $canil->getCidade(); ?>">
            </div>
            <div>
                <label for="uf">Estado</label>
                <input type="text" name="uf" value="<?php echo $canil->getUf(); ?>">
            </div>
            <input type="submit" name="btn_confirma" value="Atualizar">
        </form>
    </body>
</html>
