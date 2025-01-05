
<?php
session_start();
include('includes/config.php');
{
    //print_r($_POST['nome']);
    //print_r($_POST['hostelefone']);
    //print_r($_POST['cpf']);
    //print_r($_POST['cidade']);
    //print_r($_POST['usutelefone']);






if(count($_POST)){
   $nome = $_POST['nome'];
   $hostelefone = $_POST['hostelefone'];
  $cpf = $_POST['cpf'];
   $cidade = $_POST['cidade'];
   $usutelefone = $_POST['usutelefone'];


if ($conect->connect_error) {
   die("Falha na conexão com o banco de dados: " . $conect->connect_error);
}
$id =  $_SESSION['id_user'];
// Inserir dados no banco de dados
$sql = "INSERT INTO hubsap45_bd_hostnow.tbl_hospede (hos_nome, hos_telefone, hos_cpf, hos_id_cidade,hos_seg_tel, hos_id_usu) 
VALUES ('$nome','$hostelefone', '$cpf', '$cidade', '$usutelefone', '$id')";

if ($conect->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso.";
} else {
echo "Erro ao inserir dados: " . $conect->error;
}


}
}
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
    <title>Cadastro Hospede</title>
</head>
<body>
<header style="background-image: url('img/black_nav.png')">
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
                    <h1>Cadastre-se como hospede</h1>
                    <p> faça seu cadastro como hospede no <strong>HOST</strong>NOW</p>
                    <a href="login.php" class="btn">Entre em contato</a>
                </div>
            </section>
        </div> <!-- final do div container, header-->
    </header> <!-- final do header-->

    <br><br>

    <style>
        .formulario {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid orange;
            border-radius: 5px;
            background-color: #f5f5f5;
            box-shadow: gray;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid orange;
            border-radius: 5px;
        }

        select {
            width: 100%;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px 20px;
            background-color: orange;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color:   rgb(172, 114, 32);
        }

        h5 {
            font-size: 16px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
  <center>  <h1>Formulário de Hospede</h1> </center>
  <br> <br>
    <form class="formulario" method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" placeholder="Nome" required>

        <label for="hostelefone">Telefone do Hospede:</label>
        <input type="text" name="hostelefone" placeholder="(xx)xxxxx-xxxx" maxlength="15" onkeyup="handlePhone(event)" required>

        <label for="usutelefone">Telefone do Usuário:</label>
        <input type="text" name="usutelefone" placeholder="(xx)xxxxx-xxxx" maxlength="15" onkeyup="handlePhone(event)" required>


        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" placeholder="CPF" onkeyup="handle(event)" maxlength="14"  required>

        <h5>Estado</h5>
                    <select id="estado" name="estado">
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

        <h5>Cidade</h5>
        <select id="cidade" name="cidade">
            <option  value=""></option>

        </select>

        <center><input type="submit" value="Enviar"> <input type="reset" value="Limpar"></center>
  
    </form>


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
    <script src="./includes/app.js"></script>
    <script src="./includes/cpf.js"></script>
    <script src="./includes/telefone.js"></script>
</body>
</html>
