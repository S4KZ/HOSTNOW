<?php
include("includes/config.php");
session_start();
if(!isset($_SESSION['email'])){
    
    header('Location: login.php');
}

$hospede = "SELECT * FROM hubsap45_bd_hostnow.tbl_hospede 
INNER JOIN hubsap45_bd_hostnow.tbl_reserva
ON id_hospede = res_nome;";
$row = $conect->query($hospede);



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
                <a href="./clientes.php"  class="active">
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
                <a href="./sair.php" class="logout">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <h3>Sair</h3>
                </a>
            </div>
        </aside>

        <main>
            <h1>Clientes</h1>
            <div class="filter">
        <input type="text" id="filtro-quarto" placeholder="Filtrar por Nº do Quarto">
        <input type="text" id="filtro-pagamento" placeholder="Filtrar por form Pagamento">
                <button id="btn-filtrar">Filtrar</button>
            </div>

            <div class="recent-order">

                <table>
                   
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>N° do Quarto</th>
                            <th>Pagamento</th>
                          
                        </tr>
                    </thead>
                  
                    <tbody>
                        <tr>
                    <?php 
                    while($user = mysqli_fetch_assoc($row)){ 
                       
                        $id_hos = $user['id_hospede'];
                        $nome_hos = $user['hos_nome'];
                        $num_quarto = $user['res_id_quarto'];
                        $pagamento = $user['res_forma_pag'];
                        if($num_quarto == 0){
                            $num_quarto = "Não há reserva";
                        }
                        if($pagamento == 0){
                            $pagamento = "---";
                        }


                        ?>
                            <td><?php echo $id_hos; ?></td>
                            <td><?php echo $nome_hos; ?></td>
                            <td>
                            <?php echo $num_quarto; ?></td>
                            <td class="warning"><?php echo $pagamento ?></td>
                            
                        </tr>


                    <?php } ?>

                    </tbody>
               
                </table>
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