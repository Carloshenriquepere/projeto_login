<!DOCTYPE html>
<?php
    include_once('classes/usuario.php');
    $u = new Usuario;
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style.css">
    <title>Projeto Login</title>
</head>
<body>
    <div class="corpo_form">
        <h1>Entrar</h1>
        <form method="POST">
            <input type="emai" name="email" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <input class="acessar" type="submit" value="ACESSAR">

            <a href="cadastrar.php">
                Ainda não é inscrito?              <strong>
                    Cadastre-se!
                </strong> 
            </a>
        </form>
    </div>
    <?php 
         if(isset($_POST['email'])){
            $email =addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            if(!empty($email) && !empty($senha)){

                $u ->Conectar("projeto_login", "localhost", "root", "");
                if($u -> msgErro == ""){

                    if($u->logar($email,$senha)){

                        header("location: areaprivada.php");

                    }else{
                        ?>
                        <div class="msg_erro">Email ou Senha esttão incorretos! </div>
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