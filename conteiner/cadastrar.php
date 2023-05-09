<!DOCTYPE html>
<?php 
    include_once("classes/usuario.php");

    $u = new Usuario();

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style.css">
    <title>Projeto Login</title>
</head>
<body class="cad">
    <div class="corpo_form_cad">
        <h1>Cadastrar</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="emai" name="email" placeholder="Usuário" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confsenha" placeholder="Confirmar Senha" maxlength="15">
            <input class="acessar" type="submit" value="Cadastrar">
            <a href="index.php">Voltar</a>
        </form>
    </div>
    <?php 
    if(isset($_POST['nome'])){

        $nome = addslashes($_POST['nome']);
        $telefone =addslashes($_POST['telefone']);
        $email =addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha =addslashes($_POST['confsenha']);

        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){

            $u -> Conectar("projeto_login", "localhost", "root", "");

            if($u -> msgErro == ""){

                if($senha == $confirmarSenha){

                    if($u -> cadastrar($nome, $telefone, $email, $senha)){
                        
                        ?>
                       <div class="msg_sucesso">Cadastro com sucesso! Acesse para entrar!</div>
                        <?php

                    }else{

                        ?>
                       <div class="msg_erro">Email já cadastrado!</div>
                        <?php
                    }

                }else{

                    ?>
                    <div class="msg_erro">Senha e confirmar senha não correspodem! </div>
                    <?php
                } 

            }else{

                ?>
                <div class="msg_erro">
                    <?php 
                    echo "Erro: ".$u -> msgErro
                    ?>
                </div>
                <?php
            }

        }else{

            ?>
            <div class="msg_erro">Preencha todos os campos!</div>
            <?php
        }
    }
    ?>


</body>
</html>