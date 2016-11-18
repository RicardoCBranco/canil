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
            ini_set("display_errrors", 1);
            error_reporting(E_ALL);
            include_once '../../autoload.php';
            $ctrl = new \CasteloBranco\Canil\Module\Canino\Controller\CaninoController();
            $dados = $ctrl->editAction();
            $can = $dados["canino"];
        ?>
        <link href="../../../public/css/principal.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form name="edit_canine" method="post" action="">
            <input type="hidden" name="id_canino" value="<?php echo $can->getIdCanino();?>">
            <div>
                <label for="nome_canino">Nome:</label>
                <input type="text" name="nome_canino" value="<?php echo $can->getNomeCanino();?>">
            </div>
            <div>
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" name="data_nascimento" value="<?php echo $can->getDataNascimento();?>">
            </div>
            <div>
                <label for="pedigree">Pedigree:</label>
                <input type="text" name="pedigree" value="<?php echo $can->getPedigree();?>">
            </div>
            <div>
                <label for="microchip">Microchip:</label>
                <input type="text" name="microchip" value="<?php echo $can->getMicrochip();?>">
            </div>
            <div>
                <label for="origem">Origem:</label>
                <select name="origem">
                    <option></option>
                    <option <?php if($can->getOrigem()=="Cria própria"):?>
                        selected="true"<?php endif;?> >Cria própria</option>
                    <option <?php if($can->getOrigem()=="Paga de cruza"):?>
                        selected="true"<?php endif;?> >Paga de cruza</option>
                    <option <?php if($can->getOrigem()=="Doação"):?>
                        selected="true"<?php endif;?> >Doação</option>
                    <option <?php if($can->getOrigem()=="Compra"):?>
                        selected="true"<?php endif;?> >Compra</option>
                </select>
            </div>
            <div>
                <label for="sexo">Sexo:</label>
                <input type="radio" name="sexo" value="Macho" 
                    <?php if($can->getSexo() == "Macho"): ?>
                       checked="true"<?php endif;?>>Macho &nbsp;
                <input type="radio" name="sexo" value="Fêmea"
                       <?php if($can->getSexo() == "Fêmea"): ?>
                       checked="true"<?php endif;?>>Fêmea
            </div>
            <div>
                <label for="id_raca">Raça:</label>
                <select name="id_raca">
                    <option></option>
                    <?php foreach($dados["racas"] as $opt):?>
                    <option value="<?php echo $opt->id_raca ?>"
                          <?php if($can->getIdRaca()==$opt->id_raca):?>
                        selected="true"<?php endif;?> ><?php
                    echo $opt->nome_raca ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="cor">Cor da Pelagem:</label>
                <input type="text" name="cor" value="<?php echo $can->getCor();?>">
            </div>
            <div>
                <label for="cpf">Responsável:</label>
                <select name="cpf">
                    <option></option>
                    <?php foreach ($dados["pessoa"] as $opt): ?>
                    <option value="<?php echo $opt->cpf; ?>"
                             <?php if($can->getCpf()==$opt->cpf):?>
                        selected="true"<?php endif;?>>
                        <?php echo $opt->nome_pessoa; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" name="btn_submit" value="Atualizar">
        </form>
    </body>
</html>
