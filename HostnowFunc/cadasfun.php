<?php
session_start();
include('includes/config.php');
{
    
    if(count($_POST)){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
       $estadocivil = $_POST['estadocivil'];
        $cep = $_POST['cep'];
        $cpf= $_POST['cpf'];
        $telefone= $_POST['telefone'];
        $cidade= $_POST['cidade'];
        $cargo= $_POST['cargo'];
        $senha= $_POST['senha'];

     if ($conect->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conect->connect_error);
     }
     $id =  $_SESSION['id_user'];
     // Inserir dados no banco de dados
     $sql = "INSERT INTO hubsap45_bd_hostnow.tbl_funcionario (fun_nome, fun_email, fun_est_civil, fun_cep, fun_cpf, fun_telefone, fun_id_cidade, fun_id_cargo, fun_senha) 
     VALUES ('$nome','$email', '$estadocivil', '$cep', '$cpf', '$telefone', '$cidade','$cargo', '$senha')";
     
     if ($conect->query($sql) === TRUE) {
         echo "Dados inseridos com sucesso.";
     } else {
     echo "Erro ao inserir dados: " . $conect->error;
     }
     
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
                <a href="./funcionario.php" class="active">
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
            <a href="funcionario.php" class="cadasfun">
                Voltar</a>
            <br>
            <br>
            <div class="box">
                <h2>Cadastrar Funcionário</h2>






                <form action="" method="post">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="estado-civil">Estado Civil:</label>
                        <select id="estado-civil" name="estadocivil" required>
                            <option value="solteiro">Solteiro(a)</option>
                            <option value="casado">Casado(a)</option>
                            <option value="divorciado">Divorciado(a)</option>
                            <option value="viuvo">Viúvo(a)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cep">CEP:</label>
                        <input type="text" id="cep" name="cep"  maxlength="9" onkeyup="handlep(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" id="cpf" name="cpf" maxlength="14" required onkeyup="handle(event)">
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone" maxlength="15"  required onkeyup="handlePhone(event)"> 
                    </div>
                    <div class="form-group">
                        
                        <label for="estado">Estado:</label>
                        <select id="estado" name="estado" required>
                        <option value=""></option>
                        <?php
                    $resultado = "SELECT * FROM hubsap45_bd_hostnow.tbl_uf ORDER BY uf_nome ASC";
                    $resultado = mysqli_query($conect, $resultado);
                    while($row = mysqli_fetch_assoc($resultado)) { ?>
                    <option <?php if(isset($_POST['pes_estado']) &&  $_POST['estado']) echo 'selected'; ?> 
                    value= "<?php echo $row['id_uf']; ?>"> <?php echo $row['uf_nome']; ?> 
                    </option> <?php
                    }  

                    ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <select id="cidade" name="cidade" required>
                            <option value=""></option>

                        </select>
                    </div>
                    <div class="form-group">
                        
                        <label for="cargo">Cargo:</label>
                        <select id="cargo" name="cargo" required>
                        <option value=""></option>
                        <?php
                    $resultado3 = "SELECT * FROM hubsap45_bd_hostnow.tbl_cargo ORDER BY car_nome ASC";
                    $resultado3 = mysqli_query($conect, $resultado3);
                    while($row3 = mysqli_fetch_assoc($resultado3)) { ?>
                    <option 
                    value= "<?php echo $row3['id_cargo']; ?>"> <?php echo $row3['car_nome']; ?> 
                    </option> <?php
                    }  

                    ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha"  maxlength="8" required>
                    </div>
                    <button type="submit" class="cadastrar-funcionario">Cadastrar</button>
                </form>
            </div>
        </main>

<?php 









?>
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
    <script src="./includes/app.js"></script>
    <script src="./includes/cpf.js"></script>
    <script src="./includes/telefone.js"></script>
    <script src="./cep.js"></script>
</body>

</html>