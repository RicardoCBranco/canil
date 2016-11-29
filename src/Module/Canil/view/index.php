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
            $dados = $ctrl->indexAction();
        ?>
        <link href="../../../public/css/principal.css" rel="stylesheet" type="text/css">
        <script src="../../../public/jscript/sorttable.js"></script>
    </head>
    <body>
        <table class="sortable">
            <thead>
                <tr>
                    <th>Nome do Canil</th>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dados["canil"] as $row): ?>
                <tr>
                    <td><?php echo $row->nome_canil; ?></td>
                    <td><?php echo $row->endereco; ?></td>
                    <td><?php echo $row->bairro; ?></td>
                    <td><?php echo $row->cidade; ?></td>
                    <td><?php echo $row->uf; ?></td>
                    <td><a href="edit.php?id_canil=<?php echo $row->id_canil; ?>">Editar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">Registros encontrados: <?php echo  count($dados["canil"]); ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
