<?php
session_start();
include('includes/config.php');
if(!isset($_SESSION['email'])){
    
   
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;1,400&family=PT+Sans:ital@1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="estilo.css"/>
    
</head>
<body>
    
<div style="margin-top: 30px;" class="container">
<form action="" method="post" id="form">
<br><br>
<img src="img/logo2.png" alt="" style="margin-top: 90px;" height="100vh" width="130vh">
<div class="contend">
<input type="text" id="email" name="email" placeholder="Email:" required>
<br><br>
<input type="password" id="senha" name="senha" maxlength="8" placeholder="Senha:" required>
</div>

<input style="width: 50%;" value="Logar" type="submit" class="btn">

<br>
</form>
<br>
<?php
if(count($_POST) > 0){

$email =$_POST['email'];
$senha =  $_POST['senha'];

$sql = "SELECT * FROM hubsap45_bd_hostnow.tbl_funcionario
WHERE fun_email = '$email' AND fun_senha = '$senha' AND fun_id_cargo IN ('1','2')";

$row = $conect->query($sql);


if(mysqli_num_rows($row) < 1){
    ?>
    <div class="errobox">
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" style="float: left; margin-top: auto;
      margin-left: auto;" fill="currentColor" class="bi bi-exclamation-octagon-fill sgv" viewBox="0 0 16 16">
<path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>   <p>ERRO AO LOGAR! TENTE NOVAMENTE</p>
      </div>
      <?php
   

}else{
    $user = $row->fetch_Object();//pega as informações do select
    $_SESSION['id'] = $user->id_funcionario;
        $_SESSION['cargo'] = $user->fun_id_cargo;
        $_SESSION['nome'] = $user->fun_nome; //pega o nome do select efetuado
        $_SESSION['tel'] = $user->fun_telefone;//pega o telefone do select efetuado
        $_SESSION['cpf'] = $user->fun_cpf;//pega o cpf do select efetuado
        $_SESSION['cid'] = $user->fun_id_cidade;//pega a cidade do select efetuado
        $_SESSION['estciv'] = $user->fun_est_civil;//estado civil
        $_SESSION['cep'] = $user->fun_cep;
        $_SESSION['email'] = $user->fun_email;
        header('location: index.php');

       
    
}
    }
?>
       

   
</div>
</body>
</html>