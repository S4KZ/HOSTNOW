<?php
session_start();
include("includes/config.php");
{

   
    // Verificar se houve uma requisição POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obter os valores enviados pelo formulário
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $id_fun = $_SESSION['id'];
        $reserva = $_POST['reserva'];
    
        // Conectar ao banco de dados
    
        if ($conect->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conect->connect_error);
        }
    
        // Inserir dados no banco de dados
        $sql = "INSERT INTO  hubsap45_bd_hostnow.tbl_hospedagem (hos_hr_checkin, hos_hr_checkout,hos_id_responsa, hos_id_reserva) 
                VALUES ('$checkin', '$checkout', '$id_fun', '$reserva')";
        if ($conect->query($sql) === TRUE) {
            echo "Dados inseridos com sucesso.";
        } else {
            echo "Erro ao inserir dados: " . $conect->error;
        }
    
        // Fechar a conexão com o banco de dados
        $conect->close();
    }
 
}

    












?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href=".\style.css">
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
                    <h3>Gráficos</h3>
                </a>
                <a href="./quartos.php" class="active">
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
            <h1>Quartos</h1>
            <br>
            <a href="quartos.php" class="cadasfun">
                Voltar</a>
            <br>
            <br>
            <div class="box">
                <h2>Cadastrar Hospedagem</h2>
                <form action="" method="POST">
                    <label for="checkin">Horário de Check-in:</label>
                    <input type="time" id="checkin" name="checkin">

                    <label for="checkout">Horário de Check-out:</label>
                    <input type="time" id="checkout" name="checkout">



                    <label for="reserva">Reserva:</label>
                    <select id="reserva" name="reserva">
                    <option value=""></option>  
                    <?php
                    $resultado3 = "SELECT id_reserva, id_hospede, hos_nome, res_id_quarto
                    FROM hubsap45_bd_hostnow.tbl_reserva 
                    INNER JOIN hubsap45_bd_hostnow.tbl_hospede ON res_nome = id_hospede order by hos_nome asc;";
                    $resultado3 = mysqli_query($conect, $resultado3);
                    while($row3 = mysqli_fetch_assoc($resultado3)) { ?>
                    <option 
                    value= "<?php echo $row3['id_reserva']; ?>"> Nº <?php echo $row3['res_id_quarto']; ?> - <?php echo $row3['hos_nome']; ?> 
                    </option> <?php
                    }  

                    ?>
                    </select>

                    <input type="submit" value="Enviar">
                </form>
            </div>
<?php
if(count($_POST) > 0){
     $checkin = time('H:i:s');
     $checkout = time('H:i:s');
echo "<br>" . $checkin . "<br>" . $checkout;
}
?>
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