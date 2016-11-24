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
        <link href="../../../public/css/principal.css" type="text/css" rel="stylesheet">
        <?php
         include_once '../../autoload.php';
         $ctrl = new \CasteloBranco\Canil\Module\Raca\Controller\RacaController();
         $dados = $ctrl->editAction();
         $raca = $dados['raca'];
        ?>
    </head>
    <body>
        <form method="post" action="">
            <input type="hidden" name="id_raca" value="<?php echo $raca->getIdRaca();?>">
            <div>
                <label for="nome_raca"></label>
                <input type="text" name="nome_raca" value="<?php echo $raca->getNomeRaca();?>">
            </div>
            <input type="submit" name="btn_ok" value="Atualizar">
        </form>
    </body>
</html>
