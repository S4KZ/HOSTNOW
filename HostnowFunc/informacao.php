<?php
include('includes/config.php');
session_start();
if(!isset($_SESSION['email'])){
    
    header('Location: login.php');
}                                              
$idcidade = $_SESSION['cid'];
$idcargo = $_SESSION['cargo'];

$cargo = "SELECT * FROM hubsap45_bd_hostnow.tbl_cargo WHERE id_cargo = '$idcargo'";
$cidade = "SELECT * FROM hubsap45_bd_hostnow.tbl_cidade WHERE id_cid = '$idcidade'";

$run = $conect->query($cargo);
$nome = $run->fetch_Object();
$nomecar = $nome->car_nome;

$run2 = $conect->query($cidade);
$nome2 = $run2->fetch_Object();
$nomecid = $nome2->cid_nome;

 $_SESSION['cargo2'] = $nomecar;
 $_SESSION['cidade2']  = $nomecid;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="./style.css">
    <title>HostNow</title>
</head>

<body>

    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="./img/logo.PNG" alt="">
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-outlined">
                        close
                    </span>
                </div>
            </div>
            <div class="sidebar">
                <a href="./index.php">
                    <span class="material-symbols-outlined">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="./quartos.php">
                    <span class="material-symbols-outlined">
                        bed
                    </span>
                    <h3>Quartos</h3>
                </a>
                <a href="./clientes.php">
                    <span class="material-symbols-outlined">
                        person
                    </span>
                    <h3>Clientes</h3>
                </a>
                <a href="./informacao.php" class="active">
                    <span class="material-symbols-outlined">
                        error
                    </span>
                    <h3>Informações</h3>
                </a>
                <a href="./funcionario.php">
                    <span class="material-symbols-outlined">
                        badge
                    </span>
                    <h3>Funcionários</h3>
                </a>
                <a href="./sair.php" class="logout">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <h3>Sair</h3>
                </a>
            </div>
        </aside>

        <main>
            <h1>Informações</h1>

            <div class="insights">
                <div class="middle">
                    <div class="left">
                        <h3>Nome:</h3>
                        <h1><?php echo $_SESSION['nome'];  ?></h1>
                    </div>
                </div>

                <div class="expenses">
                    <div class="middle">
                        <div class="left">
                            <h3>Função:</h3>
                            <h1><?php echo $nomecar;  ?></h1>
                        </div>
                    </div>
                </div>

                <div class="income">
                    <div class="middle">
                        <div class="left">
                            <h3>Email:</h3>
                            <h1><?php echo $_SESSION['email'];  ?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="insights">
                <div class="middle">
                    <div class="left">
                        <h3>Cep:</h3>
                        <h1><?php echo $_SESSION['cep'];  ?></h1>
                    </div>
                </div>

                <div class="expenses">
                    <div class="middle">
                        <div class="left">
                            <h3>CPF:</h3>
                            <h1><?php echo $_SESSION['cpf'];  ?></h1>
                        </div>
                    </div>
                </div>
                
                <div class="income">
                    <div class="middle">
                        <div class="left">
                            <h3>Telefone:</h3>
                            <h1><?php echo $_SESSION['tel'];  ?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="insights">

                <div class="expenses">
                    <div class="middle">
                        <div class="left">
                            <h3>Cidade:</h3>
                            <h1><?php echo $nomecid;  ?></h1>
                        </div>
                    </div>
                </div>
                
            </div>


        </main>

        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-outlined">
                        menu
                    </span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-outlined active">
                        light_mode
                    </span>
                    <span class="material-symbols-outlined">
                        dark_mode
                    </span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Olá, <b><?php echo $_SESSION['nome'];?></b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="./img/profile.PNG">
                    </div>
                </div>
            </div>

            <div class="recent-updates">
                <h2>Atualizações Recentes</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./img/profile.PNG" alt="">
                        </div>
                        <div class="message">
                            <p><b>Miguel Prata Silva</b> reservou um quarto</p>
                            <small class="text-muted">2 Minutos Atrás</small>
                        </div>
                        <div class="profile-photo">
                            <img src="./img/profile.PNG" alt="">
                        </div>
                        <div class="message">
                            <p><b>Wallace Rodrigues</b> realizou o Check-In</p>
                            <small class="text-muted">3 horas Atrás</small>
                        </div>
                        <div class="profile-photo">
                            <img src="./img/profile.PNG" alt="">
                        </div>
                        <div class="message">
                            <p><b>Sarah Lima</b> reservou um quarto</p>
                            <small class="text-muted">8 horas Atrás</small>
                        </div>
                        <div class="profile-photo">
                            <img src="./img/profile.PNG" alt="">
                        </div>
                        <div class="message">
                            <p><b>Sofia Mieko</b> solicitou o Check-out</p>
                            <small class="text-muted">12 horas Atrás</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./blackmode.js"></script>
</body>

</html> 