<?php
include('includes/config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    <title>Configurações do Usuário</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container-block {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 5px 5px 10px #888888;
        }

        .profile-links {
            float: left;
            margin-right: 20px;
        }

        .profile-links img {
            width: 100px;
            height: 100px;
            border: 2px solid white;
            border-radius: 50%;
        }

        .insights {
            color: #333;
        }

        hr {
            border-color: #ccc;
        }

        h1 {
            font-size: 24px;
            margin: 0;
        }

        h3 {
            font-size: 16px;
            margin: 10px 0;
        }

        .usu{
            margin-left: 145px;
        }
  
    </style>
</head>



</head>
    
<header style="background-image: url('img/black_nav.png')">
        <div class="container">
            <nav>
                <a href="index.php">
                    <img src="img/logo.png" alt="Logo">
                </a>
                <ul class="ul">
                    <a href="index.php">Home</a>
                    <a href="reservar.php">Reservar</a>
                    <?php
                   
                    if(!isset($_SESSION['email_user'])){
                        ?> <a href="cadastrar.php">Cadastrar</a> <?php
                        
                       
                    } else {
                       
                        ?><a href="usu_info.php"> <?php echo $_SESSION['nome_user']; ?> </a>   <?php
                    }
                    ?>
                    <div class="close-icon">
                        <i class="fa fa-times"></i>
                    </div> <!-- final da div close-icon-->
                </ul>
                <div class="menu-icon">
                    <i class="fa fa-bars"></i>
                </div> <!-- final da div menu-icon-->
            </nav>

        </div> <!-- final do div container, header-->
    </header> <!-- final do header-->

    <br><br>

 <body>
 <main>
    <div class="usu">
    <h1>Informações Usuário</h1>
    </div>
    <br><hr><br>
    <div class="container-block">
        <div class="row">
            <div class="col-md-6">
                <div class="profile-links">
                    <img src="img/usuario.jpg" width="100px" height="100px">
                </div>
            </div>

            <div class="col-md-6">
                <div class="details">
                    <div class="row">
                        <div class="col-8">
                            <div class="insights">
                                <div class="middle">
                                    <div class="left">
                                        <h3>Nome:</h3>
                                        <h1><?php echo $_SESSION['nome_user'];?></h1>
                                    </div>
                                </div>
                                <hr>
                                <div class="middle">
                                    <div class="left">
                                        <h3>Email:</h3>
                                        <h1><?php echo $_SESSION['email_user'];?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

 </body>
</html>