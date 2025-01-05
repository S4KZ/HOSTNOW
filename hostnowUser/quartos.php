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
    <title>QUARTOS</title>
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
                    <h1>QUARTOS</h1>
                    <p> Veja os quartos que o <strong>HOST</strong>NOW proporciona para sua reserva</p>
                    <a href="login.php" class="btn">Entre em contato</a>
                </div>
            </section>
        </div> <!-- final do div container, header-->
    </header> <!-- final do header-->

    <br><br>


    <section class="quartos">
        <div class="container">
            <h3>Nossos Quartos</h3>
            <p>Veja os tipos de quartos e suítes que temos no hotal para a realização de sua reserva</p><br>
            <div class="card">
                <div class="card-container">
                    <img src="img/quarto1 (1).png" alt="quarto1">
                    <div class="card-content"> <br>
                        <h3 class="nome-quarto">Quarto Standard</h3>
                        <p class="desc-quarto">
                            • 1 Cama<br>
                            • Criado-mudo<br>
                            • Mesa<br>
                            • Guarda-Roupa <br>
                            • Armário<br>
                            • 1 Banheiro Privado<br>
                        </p><br>
                        <a class="btn" href="quarto1.php">R$ 100,00</a> <br> <br>
                    </div>
                </div>

                <div class="card-container">
                    <img src="img/quarto2.jpeg" alt="quarto2" href="reservar.php">
                    <div class="card-content"> <br>
                        <h3 class="nome-quarto">Quarto Deluxe</h3>
                        <p class="desc-quarto">
                            • Cama de casal<br>
                            • Espaço amplo<br>
                            • Serviço agregado<br>
                            • Banheira<br>
                            • Varanda<br>
                            •Apreciam a melhor visão<br>
                        </p><br>
                        <a class="btn" href="quarto2.php">R$ 150,00</a> <br> <br>
                    </div>
                </div>

                <div class="card-container">
                    <img src="img/quarto3.jpeg" alt="quarto3" href="reservar.php">
                    <div class="card-content"> <br>
                        <h3 class="nome-quarto">Suíte Executiva</h3>
                        <p class="desc-quarto">
                            • Frigobar<br>
                            • Sofá<br>
                            • Cadeiras<br>
                            • Vista mais privilegiada<br>
                            • 1 ou 2 Camas<br>
                            • 2 Banheiros<br>
                        </p><br>
                        <a class="btn" href="quarto3.php">R$ 250,00</a> <br> <br>
                    </div>
                </div>
            </div> <!--final da class cards-->
        </div> <!--final do container-->
    </section>


    <section class="quartos">
        <div class="container">
            <div class="card">
                <div class="card-container">
                    <img src="img/quarto4.jpeg" alt="quarto4" href="reservar.php">
                    <div class="card-content"> <br>
                        <h3 class="nome-quarto">Suíte de Luxo</h3>
                        <p class="desc-quarto">
                            • 1 Cama<br>
                            • Banheiro de luxo<br>
                            • Closet<br>
                            • Varanda<br>
                            • Banheira<br>
                            • Lareira e home office.<br>
                        </p><br>
                        <a class="btn" href="quarto4.php">R$ 350,00</a> <br> <br>

                    </div>
                </div>

                <div class="card-container">
                    <img src="img/quarto5.webp" alt="quarto5" href="reservar.php">
                    <div class="card-content"><br>
                        <h3 class="nome-quarto">Quarto Familiar</h3>
                        <p class="desc-quarto">
                            • Banheiro privativo<br>
                            • 1 Cama de casal e 1 de Solteiro<br>
                            • Armário<br>
                            • Criado-mudo<br>
                            • Mesa pequena<br>
                            • 1 Banheiro<br>
                        </p><br>
                        <a class="btn" href="quarto5.php">R$ 200,00</a> <br> <br>
                    </div>
                </div>
            </div> <!--final da class cards-->
        </div> <!--final do container-->
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

                <br><br> <a class="btn" href="quartos.php">⬆️ VOLTAR PARA CIMA</a>

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