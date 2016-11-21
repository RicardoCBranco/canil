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
        ini_set("display_errors", 1);
            error_reporting(E_ALL);
            include_once '../../autoload.php';
            $ctrl = new \CasteloBranco\Canil\Module\Canino\Controller\CaninoController();
            $dados = $ctrl->addAction();
        ?>
        <link href="../../../public/css/principal.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form name="add_canine" method="post" action="">
            <div>
                <label for="nome_canino">Nome:</label>
                <input type="text" name="nome_canino">
            </div>
            <div>
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" name="data_nascimento">
            </div>
            <div>
                <label for="pedigree">Pedigree:</label>
                <input type="text" name="pedigree">
            </div>
            <div>
                <label for="microchip">Microchip:</label>
                <input type="text" name="microchip">
            </div>
            <div>
                <label for="origem">Origem:</label>
                <select name="origem">
                    <option></option>
                    <option>Cria própria</option>
                    <option>Paga de cruza</option>
                    <option>Doação</option>
                    <option>Compra</option>
                </select>
            </div>
            <div>
                <label for="sexo">Sexo:</label>
                <input type="radio" name="sexo" value="Macho">Macho &nbsp;
                <input type="radio" name="sexo" value="Fêmea">Fêmea
            </div>
            <div>
                <label for="id_raca">Raça:</label>
                <select name="id_raca">
                    <option></option>
                    <?php foreach($dados["racas"] as $opt):?>
                    <option value="<?php echo $opt->id_raca ?>"><?php
                    echo $opt->nome_raca ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="cor">Cor da Pelagem:</label>
                <input type="text" name="cor">
            </div>
            <div>
                <label for="cpf">Responsável:</label>
                <select name="cpf">
                    <option></option>
                    <?php foreach ($dados["pessoa"] as $opt): ?>
                    <option value="<?php echo $opt->cpf; ?>">
                        <?php echo $opt->nome_pessoa; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" name="btn_submit" value="Inserir">
        </form>
    </body>
</html>
