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
    <title>SERVIÇOS</title>
</head>

<body>
    <header style="background-image: url('img/background-hospedagem.png')">
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
                    <h1>SERVIÇOS</h1>
                    <p> Veja os SERVIÇOS que o <strong>HOST</strong>NOW proporciona para seus hospedes</p>
                    <a href="login.php" class="btn">Entre em contato</a>
                </div>
            </section>
        </div> <!-- final do div container, header-->
    </header> <!-- final do header-->

    <br><br>
    <br><br>

    <br><hr><br>

    <section class="depoimentos">
        <div class="container">
            <h3>RESTAURANTE</h3>
            <p> staurante de alta qualidade com cozinheiros e chefes renomados </p>
        </div>
    </section>

    <br>

    <section class="bemvindo">
        <div class="container">
            <div class="bemvindo-text">
                <img src="img/restaurante1.png" alt="">
            </div>
            <div class="bemvindo-text">
                <img src="img/restaurante2.png" alt="">
            </div>

            <div class="bemvindo-text">
                <img src="img/restaurante3.png" alt="">
            </div>
        </div>
    </section>

    <br><br>
    <br><br>

    <section class="depoimentos">
        <div class="container">
            <h3>SPA</h3>
             <p> Academia com os melhores equipamentos para o seu uso </p>
        </div>
    </section>

    <br>

    <section class="bemvindo">
        <div class="container">
            <div class="bemvindo-text">
                <img src="img/spar1.png" alt="">
            </div>
            <div class="bemvindo-text">
                <img src="img/spar2.png" alt="">
            </div>

            <div class="bemvindo-text">
                <img src="img/spar3.png" alt="">
            </div>
        </div>
    </section>

    <br><br>
    <br><br>

    <section class="depoimentos">
        <div class="container">
            <h3>ACADEMIA</h3>
            <p> E um Spa para ter um conforto e relaxamento adequados para você </p>
        </div>
    </section>

    <br>

    <section class="bemvindo">
        <div class="container">
            <div class="bemvindo-text">
                <img src="img/acad1.png" alt="">
            </div>
            <div class="bemvindo-text">
                <img src="img/acad2.png" alt="">
            </div>
            <div class="bemvindo-text">
                <img src="img/acad3.png" alt="">
            </div>
        </div>
    </section>

    <br><br>
    <br><br>


    <br><br>
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

                <br><br> <a class="btn" href="entret.php">⬆️ VOLTAR PARA CIMA</a>

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