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
         $dados = $ctrl->indexAction();
        ?>
        <script type="text/javascript" src="jscript/actionRaca.js"></script>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Raça</th><th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dados['raca'] as $row): ?>
                <tr>
                    <td><?php echo $row->nome_raca; ?></td>
                    <td>
                        <button onclick="edita(<?php echo $row->id_raca ?>)">Editar</button>   
                        <button onclick="deleta(<?php echo $row->id_raca ?>)" class="btnRaca">Deleta</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Registros Encontrados: <?php echo count($dados["raca"]);?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
