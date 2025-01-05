<?php
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    <title>Cadastro</title>
</head>

<body>

    <div class="container">
        <div class="form-image">
            <img src="img/undraw_develop_app_re_bi4i.png">
        </div> <!--final div form-image-->
        <div class="form">
            <form action="" method="post">
                <div class="form-header">

                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div> <!--final da div title-->

                    <div class="login-button">
                        <button><a href="login.php">ENTRAR</a></button>
                    </div> <!--final da div login-button-->
                </div> <!--final da div form-header-->

                <div class="input-group">
                    <div class="input-box">
                        <label for="name">Nome:</label>
                        <input  id="name" type="text" name="name" placeholder="Digite seu nome" required>
                    </div> <!--final div input-box-->

                    <div class="input-box">
                        <label for="email">Email:</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu email" required>
                    </div> <!--final div input-box-->

                    <div class="input-box">
                        <label for="senha">Senha:</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div> <!--final div input-box-->

                </div> <!--final div input-group-->

                <div class="continue-btn">
                    <button><a href="">Cadastrar</a></button>
                </div>

            </form>
            <?php
            if(count($_POST)){
                
                $nome = $_POST['name'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];

            $sql  = "INSERT INTO hubsap45_bd_hostnow.tbl_usuario(usu_nome, usu_email, usu_senha) 
            VALUES('$nome','$email','$senha')";
            if($conect->query($sql) === TRUE){
                header('location: login.php');
            
            }else{
                echo "erro";
            }
            }
            ?>
        </div> <!--final div form-->
    </div> <!--final div container-->
</body>

</html>