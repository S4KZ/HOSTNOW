<?php
include("includes/config.php");
session_start();
if(!isset($_SESSION['email'])){
    
    header('Location: login.php');
}

//quartos livres
$livre = "SELECT COUNT(qua_status) AS count FROM hubsap45_bd_hostnow.tbl_quarto 
WHERE qua_status = 'Livre'"; //variavel que mostra quartos disponiveis
$result = mysqli_query($conect, $livre);//executa a linha que mostra os quartos
$row = mysqli_fetch_assoc($result);//pegar informação dos dados acima
$livre2 = $row['count'];//transforma o comando count em uma variavel

//quartos ocupados
$ocupado = "SELECT COUNT(qua_status) AS count FROM hubsap45_bd_hostnow.tbl_quarto 
WHERE qua_status = 'Ocupado'";
$result2 = mysqli_query($conect, $ocupado);
$row2 = mysqli_fetch_assoc($result2);
$ocupado2 = $row2['count'];

//soma da renda

$rendimento = "SELECT SUM(res_total_pag) AS renda  
FROM hubsap45_bd_hostnow.tbl_reserva;";
$result3 = mysqli_query($conect, $rendimento);
$row3 = mysqli_fetch_assoc($result3);
$renda = $row3['renda'];

/*o comando 'AS' serve para dar nome para uma coluna, 
para isso usa para pegar com o fetch para tranformar em uma varialvel
*/
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
                <a href="./index.php" class="active">
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
                <a href="./informacao.php">
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
                <a href="sair.php" class="logout">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <h3>Sair</h3>
                </a>
            </div>
        </aside>

        <main>
            <h1>Gestão</h1>

            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-outlined">
                        monitoring
                    </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Rendimento</h3>
                            <h1>R$<?php echo $renda; ?></h1>
                        </div>
                    </div>
                    <small class="text-muted">Ultima semana</small>
                </div>

                <div class="expenses">
                    <span class="material-symbols-outlined">
                        meeting_room
                    </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Ocupação</h3>
                            <h1><?php echo $ocupado2; ?> Quartos </h1>
                        </div>
                    </div>
                </div>

                <div class="income">
                    <span class="material-symbols-outlined">
                        bed
                    </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Quartos disponíveis</h3>
                            <h1><?php echo $livre2; ?> Quartos</h1>
                        </div>
                    </div>
                </div>
            </div>
<br><br>
            <div class="recent-order">
                <h2>Clientes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>N° do Quarto</th>
                            <th>Pagamento</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>73</td>
                            <td>Miguel Prata Silva</td>
                            <td>26</td>
                            <td>Cartão</td>
                            <td class="warning">Reservado</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Wallace Rodrigues</td>
                            <td>06</td>
                            <td>Dinheiro</td>
                            <td class="warning">Check-In feito</td>
                        </tr>
                        <tr>
                            <td>94</td>
                            <td>Sarah Lima</td>
                            <td>20</td>
                            <td>Cartão</td>
                            <td class="warning">Reservado</td>
                        </tr>
                        <tr>
                            <td>42</td>
                            <td>Sofia Mieko</td>
                            <td>07</td>
                            <td>Cartão</td>
                            <td class="warning">Check-Out pendente</td>
                        </tr>
                    </tbody>
                </table>
                <a href="./clientes.php"> Mostrar todos</a>
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
                        <img src="img/profile.png">
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