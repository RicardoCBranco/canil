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
        <script src="../../../public/jscript/mascara.js" type="text/javascript"></script>
        <link href="../../../public/css/principal.css" type="text/css" rel="stylesheet">
        <?php
            include_once '../../autoload.php';
            $ctrl = new \CasteloBranco\Canil\Module\Pessoa\Controller\PessoaController();
            $dados = $ctrl->editAction();
            $pes = $dados['pessoa'];
        ?>
    </head>
    <body>
        <form method="post" action="">
            <input type="hidden" name="cpf" value="<?php echo $pes->getCpf();?>">
            <div>
                <label for="nome_pessoa">Nome Completo</label>
                <input type="text" name="nome_pessoa" 
                       value="<?php echo $pes->getNomePessoa(); ?>">
            </div>
            <div>
                <label for="cpf_visualiza">CPF</label>
                <input type="text" name="cpf_visualiza" 
                       onkeypress="formatar_mascara(this,'###.###.###-##')" 
                       value="<?php echo $ctrl->geraCpf($pes->getCpf()); ?>" 
                       disabled="true">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" 
                       value="<?php echo $pes->getEmail(); ?>">
            </div>
            <div>
                <label for="senha">Senha</label>
                <input type="password" name="senha">
            </div>
            <div>
                <label for="id_perfil">Função</label>
                <select name="id_perfil">
                    <option></option>
                    <?php foreach($dados['perfil'] as $opt): ?>
                    <option value="<?php echo $opt->id_perfil; ?>"
                            <?php if($opt->id_perfil == $pes->getIdPerfil()): ?>
                            selected="true"
                            <?php endif;?>>
                        <?php echo $opt->tipo_perfil; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" value="Atualizar" name="btn_confirma">
        </form>
    </body>
</html>
