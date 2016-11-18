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
        <script src="../../../public/jscript/sorttable.js"></script>
    </head>
    <body>
        <?php
            include_once '../../autoload.php';
            $ctrl = new CasteloBranco\Canil\Module\Canino\Controller\CaninoController();
            $dados = $ctrl->indexAction();
        ?>
        <table class="sortable">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Pedigree</th>
                    <th>Microchip</th>
                    <th>Origem</th>
                    <th>Sexo</th>
                    <th>Raça</th>
                    <th>Cor</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dados["caninos"] as $row): ?>
                <tr>
                    <td><a href=""><?php echo $row->nome_canino ?></a></td>
                    <td><?php echo date("d/m/Y",strtotime($row->data_nascimento)) ?></td>
                    <td><?php echo $row->pedigree ?></td>
                    <td><?php echo $row->microchip ?></td>
                    <td><?php echo $row->origem ?></td>
                    <td><?php echo $row->sexo ?></td>
                    <td><?php echo $row->nome_raca ?></td>
                    <td><?php echo $row->cor; ?></td>
                    <td><a href="edit.php?id_canino=<?php echo $row->id_canino; ?>">
                            Atualizar</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">Registros Localizados: <?php echo count($dados['caninos']);?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
