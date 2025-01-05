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
    <link rel="stylesheet" href="css/style.css">
    <title>HOSTNOW</title>
</head>

<body>
    <header style="background-image: url('img/background-home.png')">
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
                    
                    <a class="btn" href="sobre.php">Sobre</a>
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
                    <h1>HOSTNOW</h1>
                    <p> Faça sua reserva aqui em nosso site o <strong>HOST</strong>NOW </p>
                    <?php
                   
                    if(!isset($_SESSION['email_user'])){
                        ?> <a href="login.php" class="btn">Faça seu login</a> <?php
                       
                    } else {
                       
                        ?> <a href="" class="btn">Olá! <?php echo $_SESSION['nome_user'];  ?></a> <?php
                    }
                    ?>
                   
                </div>
            </section>
        </div> <!-- final do div container, header-->
    </header> <!-- final do header-->

    <br><br>

    <section class="bemvindo">
        <div class="container">
            <div class="bemvindo-text">
                <h3> Bem Vindo ao HOSTNOW</h3>
                <p>Explore, escolha e reserve seu quarto com HOSTNOW e descubra o conforto e as conveniências que só uma reserva bem-sucedida 
pode proporcionar. Estamos aqui para tornar suas viagens mais acessível.
                </p>
            </div>
            <div class="bemvindo-text">
                <img src="img/img1.png" alt="">
            </div>
        </div>
    </section>

    <br><br><br><br>

    <section class="bemvindo">
        <div class="container">
            <div class="bemvindo-text">
                <img src="img/img2.png" alt="">
            </div>
            <div class="bemvindo-text">
                <h3> Nossos Quartos </h3>
                <p>Explore uma ampla variedade de opções de quartos com base em suas preferências, necessidades 
e orçamento. Nossa pesquisa avançada garante que você encontre o lugar perfeito.
                </p>
                <br><a class="btn" href="quartos.php">VEJA MAIS</a>

            </div>
        </div>
    </section>

    <br><br><br><br>

    <section class="bemvindo">
        <div class="container">
            <div class="bemvindo-text">
                <h3>O Que temos?</h3>
                <p>Os hotéis oferecem uma ampla variedade de comodidades e serviços para garantir uma estadia confortável e agradável aos hóspedes. 
Aqui está uma descrição geral do temos
                </p>
                <br><a class="btn" href="entret.php">VEJA MAIS</a>
            </div>
            <div class="bemvindo-text">
                <img src="img/img3.png" alt="">
            </div>
        </div>
    </section>

    <br><br><br><br>

    <section class="depoimentos">
        <div class="container">
            <h3>Avaliações dos Clientes</h3>
            <p>Leia o que nossos clientes acharam dos nossos serviços</p>
            <div class="cards">
                <div class="cards-item">
                    <img src="img/user1.png" alt="">
                    <p class="nome-user">Brody Romero</p>
                    <p class="depoimento-user">
                    Reservei um quarto no hotel através deste site e a experiência foi absolutamente impecável. O processo de reserva foi rápido e fácil, 
e o quarto que escolhi correspondia exatamente às fotos e descrições fornecidas. 
                    </p>
                    <div class="star-user">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    </div>
                </div> <!--final da class cards-item1-->

                <div class="cards-item">
                    <img src="img/user2.png" alt="Miguel">
                    <p class="nome-user">Levi Weston</p>
                    <p class="depoimento-user">Este site tornou minha busca por quartos do hotel muito mais simples. A variedade de opções disponíveis é impressionante, e as 
opções de filtragem me  permitiram encontrar o tipo de quarto que atendesse às minhas necessidades.
                    </p>
                    <div class="star-user">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                </div> <!--final da class cards-item2-->

                <div class="cards-item">
                    <img src="img/user3.png" alt="Pedro">
                    <p class="nome-user">Sarah Thompson</p>
                    <p class="depoimento-user">
                    Usei este site para reservar um quarto do hotel e não fiquei nem um pouco desapontado. A plataforma é confiável, e a garantia de melhor preço 
me dá a segurança de que estou obtendo um ótimo negócio. 

                    </p>
                    <div class="star-user">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                </div> <!--final da class cards-item3-->

            </div> <!--final da class cards-->
        </div> <!--final do container-->
    </section>

    <br><br><br><br>


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

                <br><br> <a class="btn" href="index.php">⬆️ VOLTAR PARA CIMA</a>

            </div>
        </div>
    </section>

    <hr>

    <div class="final">
        <br>@<string><br>HOST</string><br>NOW - hostnow BR - https:/www.hostnow<br><br>
    </div>
    <a href="sair.php">Sair</a>
    <script src="js/main.js"></script>
</body>

</html>