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
         $dados = $ctrl->indexAction();
        ?>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Perfil</th><th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dados["perfil"] as $row): ?>
                <tr>
                    <td><?php echo $row->tipo_perfil;?></td>
                    <td>
                        <a href="edit.php?id_perfil=<?php echo $row->id_perfil;?>">Editar</a>
                        |
                        <a href="delete.php?id_perfil=<?php echo $row->id_perfil;?>">Apagar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Registros encontrados: <?php echo count($dados['perfil']);?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
