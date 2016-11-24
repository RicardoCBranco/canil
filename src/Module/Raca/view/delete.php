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
        $ctrl->deleteAction();
        ?>
    </head>
    <body>
        <form method="post" action="#" name="fmedit">
            <input type="hidden" name="id_raca" 
                   value="<?php echo filter_input(INPUT_GET, "id_raca"); ?>">
        </form>
    </body>
</html>
