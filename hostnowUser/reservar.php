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
 
    <title>RESERVA</title>
</head>

<body>
    <header style="background-image: url('img/background-sobre.png')">
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
                    <h1>RESERVA</h1>
                    <p> Veja os quartos que o <strong>HOST</strong>NOW proporciona para sua reserva</p>
                    <a href="login.php" class="btn">Entre em contato</a>
                </div>
            </section>
        </div> <!-- final do div container, header-->
    </header> <!-- final do header-->

    <br><br>


    <form class="formulario" method="post" action="">
        
        <h3>RESERVA DE QUARTO/SUÍTE</h3> <br>

        
        <label class="label">Hospede titutlar  
 
                        <select name="hospede" class="input-bordas "  >
                        <?php 
                          $id_user = $_SESSION['id_user']; 
                        $hospede = "SELECT * FROM hubsap45_bd_hostnow.tbl_hospede WHERE hos_id_usu = '$id_user'" ;
                        $hospede2 = mysqli_query($conect, $hospede);
                        while ($hos = mysqli_fetch_assoc($hospede2)) {
                            $id_hos = $hos['id_hospede'];
                            $nome_hos = $hos['hos_nome'];
                            echo "<option value='$id_hos'>$nome_hos</option>";
                        }
                        ?>
                           
                        </select>
                        <span class="focus-border"> <i></i> </span>
       
                        </label> 
       

        <label class="label">Quartos
 
        <select name="quarto" class="input-bordas">
    <?php
    $quarto = "SELECT * FROM hubsap45_bd_hostnow.tbl_quarto 
    INNER JOIN hubsap45_bd_hostnow.tbl_tipo_quarto
    ON qua_id_tipo = id_tipo_quarto WHERE qua_status = 'Livre'";

    $quartoResult = mysqli_query($conect, $quarto);
    while ($row = mysqli_fetch_assoc($quartoResult)) {
        $id_quarto = $row['id_quarto'];
        $tipo = $row['tip_nome'];
        $valor = $row['tip_valor'];
        echo "<option value='$id_quarto'> Nº: $id_quarto - $tipo - $valor R$ </option>";
    }
    ?>
</select>
            <span class="focus-border"> <i></i> </span>
            </label>

        <label class="label">Forma de Pagamento
    
        <select  name="pagamento" class="input-bordas"  >
        <option value="Débito">Débito</option> 
        <option value="Dinheiro">Dinheiro</option> 
        <option value="Crédito">Crédito</option>                       
        </select>
        <span class="focus-border"> <i></i> </span>
    </label>

        <label class="label"> Data de entrada
            
            <input type="date" name="entrada" class="input-bordas" placeholder="Data da reserva" required>
            <span class="focus-border"> <i></i> </span>
        
        </label>

        <label class="label"> Data da Saída
            
            <input type="date" name="saida" class="input-bordas" placeholder="Data da Saída" required>
            <span class="focus-border"> <i></i> </span>
        
        </label>

        <label class="naoexibir">
            <span>Não preencher:</span><br>
            <input type="text" name="url" value=""></p>
        </label> 

   
        
        <a href=""> <button type="submit" class="button-form borda-inversa">Calcular</button></a>
        <br><br>
        <a style="color: orange; font-size: 16px;" 
    href="cashos.php">Não tem nenhum hospede?</a>

    </form>  
    <br><br>
    <?php
 if(count($_POST) > 0){
   $quarto = $_POST['quarto'];
    $pagamento = $_POST['pagamento'];
    $entrada = new DateTime($_POST['entrada']);
    $saida = new DateTime($_POST['saida']);
    $interval = $saida->diff($entrada);
    $dias = $interval->days;
    $valortotal = $dias * $valor;
 
   $_SESSION['id_quarto'] = $quarto;
   $_SESSION['entradadt'] = $entrada->format('Y-m-d');
   $_SESSION['saidadt'] = $saida->format('Y-m-d');
   $_SESSION['total'] = $valortotal;
   $_SESSION['hospede'] = $id_hos;
   $_SESSION['formpag'] = $_POST['pagamento'];
    ?>

<div style="margin-left: 67vh">
<hr style="width: 40vh">
<h3 style="margin: 7px;">Data de entrada: <?php echo $_SESSION['entradadt'] ?> </h3>
<h3 style="margin: 7px;">Data de saida: <?php echo $_SESSION['saidadt']; ?> </h3>
<h3 style="margin: 7px;">Dias no total: <?php echo $dias; ?> </h3>
<h3 style="margin: 7px">Valor do quarto: <?php echo $valor; ?> R$ </h3>
<h3 style="margin: 7px">Forma de pagamento: <?php echo $pagamento; ?> </h3>
<h3 style="margin: 7px">Dias * Valor: <?php echo $dias; ?> *  <?php echo $valor; ?></h3>
<h3 style="margin: 7px">Títular: <?php echo $nome_hos; ?></h3>
<hr style="width: 40vh">
<h2 style="margin: 7px">Total:  <?php echo $valortotal ; ?> R$</h2>

<a href="valireserva.php"> <input type="button" value="Confirmar" class="button-form borda-inversa" />

</div>
<?php
}
?>
 
<br>

    <hr> <br>

    <section class="bemvindo" >
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