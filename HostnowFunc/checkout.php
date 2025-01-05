<?php
include("includes/config.php");
session_start();
if(!isset($_SESSION['email'])){
    
    header('Location: login.php');
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
                <h2>Realizar Check-out</h2>
                <form actiom="" method="POST">
                    <label for="reserva">Selecione uma reserva:</label>
                    <select name="reserva" id="reserva">
                        <option value=""></option>
                        <!-- Adicione outras opções de reserva aqui -->
                        <?php
                    $resultado3 = "SELECT  id_hospedagem, id_reserva, id_hospede, hos_nome, res_id_quarto
                    FROM hubsap45_bd_hostnow.tbl_reserva 
                    INNER JOIN hubsap45_bd_hostnow.tbl_hospede ON res_nome = id_hospede
                    JOIN hubsap45_bd_hostnow.tbl_hospedagem ON hos_id_reserva = id_reserva order by hos_nome asc;";
                    $resultado3 = mysqli_query($conect, $resultado3);
                    while($row3 = mysqli_fetch_assoc($resultado3)) { ?>
                    <option 
                    value= "<?php echo $row3['id_reserva']; ?>"> Nº <?php echo $row3['res_id_quarto']; ?> - <?php echo $row3['hos_nome']; ?> 
                    </option> <?php
                    }  

                    ?>
                    </select>
                   
                    <br><br>
                    <button type="submit" class="cadastrar-funcionario">Verificar</button>
                </form>
                <br><br>
                    <?php
                    if(count($_POST) > 0){
                    
                    $id_res = $_POST['reserva'];
                    $sql="SELECT  id_hospedagem, id_reserva, id_hospede, hos_nome, hos_id_usu, res_dt_reserva, res_dt_saida, res_id_quarto, res_forma_pag, res_total_pag, res_qtd_dias
                    FROM hubsap45_bd_hostnow.tbl_reserva 
                    INNER JOIN hubsap45_bd_hostnow.tbl_hospede ON res_nome = id_hospede
                    JOIN hubsap45_bd_hostnow.tbl_hospedagem ON hos_id_reserva = id_reserva 
                    WHERE id_reserva = '$id_res' order by hos_nome asc";
                    $row = $conect->query($sql);
                    $user = $row->fetch_Object();
                    $_SESSION['id_hospedagem'] = $user->id_hospedagem;
                    $_SESSION['id_reserva'] = $user->id_reserva;
                    $_SESSION['id_hospede'] = $user->id_hospede;
                    $_SESSION['hos_id_usu'] = $user->hos_id_usu;
                    $hos_nome = $user->hos_nome;   
                    $res_dt_reserva  = $user->res_dt_reserva;
                    $res_dt_saida = $user->res_dt_saida;
                    $res_id_quarto = $user->res_id_quarto;
                    $res_forma_pag = $user->res_forma_pag;
                    $res_total_pag = $user->res_total_pag;
                    $res_qtd_dias = $user->res_qtd_dias;  
                     ?>
                <label for="nome">Nome:</label>
                    <input type="text" id="nome" value="<?php echo $hos_nome;  ?>" readonly >
                     

                    <label for="dataCheckIn">Data de Check-in:</label>
                    <input type="text" id="dataCheckIn" value="<?php echo $res_dt_reserva;  ?>" readonly>

                    <label for="dataCheckOut">Data de Check-out:</label>
                    <input type="text" id="dataCheckOut" value="<?php echo $res_dt_saida;  ?>" readonly>

                    <label for="numeroQuarto">Número do Quarto:</label>
                    <input type="text" id="numeroQuarto" value=" nº <?php echo $res_id_quarto;  ?>" readonly>

                    <label for="formaPagamento">Forma de Pagamento:</label>
                    <input type="text" id="formaPagamento" value="<?php echo $res_forma_pag;  ?>" readonly value="<?php ?>">

                    <label for="totalPagar">Total a Pagar:</label>
                    <input type="text" id="totalPagar" value="<?php echo $res_total_pag;  ?> R$" readonly>

                    <label for="quantidadeDias">Quantidade de Dias:</label>
                    <input type="text" id="quantidadeDias" value="<?php echo $res_qtd_dias;  ?> Dias" readonly>
                    <br><br>
            <a href="outchek.php"> <button type="submit" class="cadastrar-funcionario">Realizar Check-out</button></a>
                <?php
                $_SESSION['res_id_quarto'] = $res_id_quarto;
                /*
                $_SESSION['hos_nome'] = $hos_nome;
                $_SESSION['res_dt_reserva'] = $res_dt_reserva;
                $_SESSION['res_dt_saida'] = $res_dt_saida;
                $_SESSION['res_forma_pag'] = $res_forma_pag;
                $_SESSION['res_total_pag'] = $res_total_pag;
                $_SESSION['res_qtd_dias'] = $res_qtd_dias;
                */
                }
                ?>
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