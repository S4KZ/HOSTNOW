<?php
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>QUARTO 1</title>
</head>

<body>
    <header style="background-image: url('img/backgroung-quartos.png')">
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
                    
                    <a class="btn" href="usuario.php">CONTA</a>
                    <div class="close-icon">
                        <i class="fa fa-times"></i>
                    </div> <!-- final da div close-icon-->
                </ul>
                <div class="menu-icon">
                    <i class="fa fa-bars"></i>
                </div> <!-- final da div menu-icon-->
            </nav>

            <section class="banner">
                <div class="banner-text">
                    <h1>QUARTO 1</h1>
                    <a href="quartos.php" class="btn">Veja os quartos</a>
                </div>
            </section>
        </div> <!-- final do div container, header-->
    </header> <!-- final do header-->

    <br><br>


    <section class="bemvindo">
        <div class="container">
            <div class="bemvindo-text">
                <img src="img/quarto1-1.jpeg" alt="">
            </div>
            <div class="bemvindo-text">
                <img src="img/quarto1-2.jpeg" alt="">
            </div>

            <div class="bemvindo-text">
                <img src="img/quarto1-3.jpeg" alt="">
            </div>
        </div>
    </section>

    <br> <br> <br>

    <section class="bemvindo">
        <div class="container">
            <div class="bemvindo-text">
                <h3>Quarto Standard</h3>
                <p>Estes tipos de quarto de hotel são equipados para acomodar uma pessoa ou um casal, 
                e geralmente dispõem de uma cama de casal ou de duas camas de solteiro</p>
                <a class="btn" href="reservar.php">RESERVAR ➞</a>
            </div>
            <div class="bemvindo-text">
                <img src="img/quartos4.jpeg" alt="">
            </div>
        </div>
    </section>






    <br><br>
    <hr> <br>

    <section class="bemvindo">
        <div class="container">
            <div class="bemvindo-text">
                <img src="img/logo1.png" alt="" height="500" width="500">
            </div>
            <div class="bemvindo-text">
                <h3>ENTRE EM CONTATO</h3><br>
                <p> <strong>E-mail:</strong> hostnow@gamil.com</p>
                <p> <strong>Telefone:</strong> (12) 4045-3495</p>
                <p> <strong>Endereço:</strong> R. Alfonso Giannico, 350 - Pedregulho</p><br>
                <img src="img/facebook.png" alt="" height="50" width="50">
                <img src="img/instagram.png" alt="" height="50" width="50">
                <img src="img/twitter.png" alt="" height="50" width="50">
                <img src="img/telefone.png" alt="" height="50" width="50">

                <br><br> <a class="btn" href="quarto2.php">VER PROXÍMO ➞</a>

            </div>
        </div>
    </section>

    <hr>

    <div class="final">
        <br>@<string><br>HOST</string><br>NOW - hostnow BR - https:/www.hostnow<br><br>
    </div>

    <script src="js/main.js"></script>
</body>

</html>