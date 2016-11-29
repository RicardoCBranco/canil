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
            $dados = $ctrl->addAction();
        ?>
        <link href="../../../public/css/principal.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form method="post" action="">
            <div>
                <label for="nome_canil">Nome do Canil</label>
                <input type="text" name="nome_canil">
            </div>
            <div>
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco">
            </div>
            <div>
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro">
            </div>
            <div>
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade">
            </div>
            <div>
                <label for="uf">Estado</label>
                <input type="text" name="uf">
            </div>
            <input type="submit" name="btn_confirma" value="Cadastra">
        </form>
    </body>
</html>
