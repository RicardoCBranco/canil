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
         $ctrl = new \CasteloBranco\Canil\Module\Raca\Controller\RacaController();
         $dados = $ctrl->addAction();
        ?>
    </head>
    <body>
        <form method="post" action="">
            <div>
                <label for="nome_raca"></label>
                <input type="text" name="nome_raca">
            </div>
            <input type="submit" name="btn_ok" value="Adicionar">
        </form>
    </body>
</html>
