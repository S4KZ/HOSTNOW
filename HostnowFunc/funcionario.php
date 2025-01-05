<?php
include("includes/config.php");
session_start();
if(!isset($_SESSION['email'])){
    
    header('Location: login.php');
}

$sql = "SELECT * FROM hubsap45_bd_hostnow.tbl_funcionario 
INNER JOIN hubsap45_bd_hostnow.tbl_cargo ON fun_id_cargo = id_cargo ORDER BY id_funcionario DESC";
$row = $conect->query($sql);


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
                <a href="./funcionario.php"class="active">
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
            <h1>Funcionários</h1>
            <br>
            <form method="post" action="">
            <div class="filter">
                <select name="cargo" id="filtro-cargo" style="margin-right: 5px;">
                    <option value="0">Todos os cargos</option>
                    <option value="1">Gerente</option>
                    <option value="2">Secretário</option>
                    <option value="3">Recepcionista</option>
                    <option value="4">Concierge</option>
                    <option value="5">Camareira</option>
                    <option value="6">Chefe de Cozinha</option>
                </select>

                <button id="btn-filtrar">Filtrar</button>

            </div>
            <form>
<?php
if(count($_POST) > 0){
  $cargo = $_POST['cargo'];
echo $cargo."<br>";

switch($cargo){
case 0:
    $sql = "SELECT * FROM hubsap45_bd_hostnow.tbl_funcionario 
    INNER JOIN hubsap45_bd_hostnow.tbl_cargo ON fun_id_cargo = id_cargo ORDER BY id_funcionario DESC";
    $row = $conect->query($sql);
break;
case 1:
    $sql = "SELECT * FROM hubsap45_bd_hostnow.tbl_funcionario 
    INNER JOIN hubsap45_bd_hostnow.tbl_cargo ON fun_id_cargo = id_cargo WHERE fun_id_cargo = '$cargo' ORDER BY id_funcionario DESC";
    $row = $conect->query($sql);
break;
case 2:
    $sql = "SELECT * FROM hubsap45_bd_hostnow.tbl_funcionario 
    INNER JOIN hubsap45_bd_hostnow.tbl_cargo ON fun_id_cargo = id_cargo WHERE fun_id_cargo = '$cargo' ORDER BY id_funcionario DESC";
    $row = $conect->query($sql);
break;
case 3:
    $sql = "SELECT * FROM hubsap45_bd_hostnow.tbl_funcionario 
    INNER JOIN hubsap45_bd_hostnow.tbl_cargo ON fun_id_cargo = id_cargo WHERE fun_id_cargo = '$cargo' ORDER BY id_funcionario DESC";
    $row = $conect->query($sql);
break;
case 4:
    $sql = "SELECT * FROM hubsap45_bd_hostnow.tbl_funcionario 
    INNER JOIN hubsap45_bd_hostnow.tbl_cargo ON fun_id_cargo = id_cargo WHERE fun_id_cargo = '$cargo' ORDER BY id_funcionario DESC";
    $row = $conect->query($sql);
break;
case 5:
    $sql = "SELECT * FROM hubsap45_bd_hostnow.tbl_funcionario 
    INNER JOIN hubsap45_bd_hostnow.tbl_cargo ON fun_id_cargo = id_cargo WHERE fun_id_cargo = '$cargo' ORDER BY id_funcionario DESC";
    $row = $conect->query($sql);
break;
case 6:
    $sql = "SELECT * FROM hubsap45_bd_hostnow.tbl_funcionario 
    INNER JOIN hubsap45_bd_hostnow.tbl_cargo ON fun_id_cargo = id_cargo WHERE fun_id_cargo = '$cargo' ORDER BY id_funcionario DESC";
    $row = $conect->query($sql);
break;
default:


}

}
?>
            <br>
            <a href="cadasfun.php" class="cadasfun">Cadastrar Funcionário</a>

            <div class="recent-order">

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Cargo</th>
                        </tr>
                    </thead>
                    <?php while($user = mysqli_fetch_assoc($row)){  ?>
                    <tbody>
                        <tr>
                            <td><?php echo $user['id_funcionario']; ?></td>
                            <td><?php echo $user['fun_nome'];  ?></td>
                            <td><?php echo $user['fun_cpf']; ?></td>
                            <td><?php echo $user['fun_telefone']; ?></td>
                            <td class= "warning"><?php echo $user['car_nome']; ?></td>
                        </tr>
                    </tbody>
                  <?php } ?> 
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