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
        <script src="../../../public/jscript/sorttable.js"></script>
        <?php
            include_once '../../autoload.php';
            $ctrl = new \CasteloBranco\Canil\Module\Pessoa\Controller\PessoaController();
            $dados = $ctrl->indexAction();
        ?>
    </head>
    <body>
        <table class="sortable">
            <thead>
                <tr>
                    <th>Nome Completo</th><th>CPF</th><th>Email</th><th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dados['pessoas'] as $row): ?>
                <tr>
                    <td><?php echo $row->nome_pessoa; ?></td>
                    <td><?php echo $ctrl->geraCpf($row->cpf); ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><a href="edit.php?cpf=<?php echo $row->cpf;?>">Atualizar</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
