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
        <link href="../../../public/css/principal.css" rel="stylesheet" type="text/css">
        <?php
         include_once '../../autoload.php';
         $ctrl = new \CasteloBranco\Canil\Module\Perfil\Controller\PerfilController();
         $dados = $ctrl->addAction();
        ?>
    </head>
    <body>
        <form method="post" action="">
            <div>
                <label for="tipo_perfil">Tipo de Perfil</label>
                <input type="text" name="tipo_perfil">
            </div>
            <input type="submit" value="Adiciona" name="btn_ok">
        </form>
    </body>
</html>
