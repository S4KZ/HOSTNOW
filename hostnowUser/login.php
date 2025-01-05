<?php
session_start();
include('includes/config.php');
if(!isset($_SESSION['user_email'])){
    
   
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
<img src="img/logo2.png" alt="" style="margin-top: 90px;" height="140vh" width="130vh">
<div class="contend">
<input type="text" id="email" name="email" placeholder="Email:" required>
<br><br>
<input type="password" id="senha" name="senha" maxlength="8" placeholder="Senha:" required>
</div>
<a href="cadastrar.php">Não tem uma conta?<br> cadastre-se</a>
<br><br>
<input style="width: 50%;" value="Logar" type="submit" class="btn">

<br>
</form>
<br>
<?php
if(count($_POST) > 0){

$email =$_POST['email'];
$senha =  $_POST['senha'];

$sql = "SELECT * FROM hubsap45_bd_hostnow.tbl_usuario 
WHERE usu_email = '$email' AND usu_senha = '$senha';";

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
        $_SESSION['id_user'] = $user->id_usuario;
        $_SESSION['nome_user'] = $user->usu_nome;
        $_SESSION['email_user'] = $user->usu_email;
        $_SESSION['senha_user'] = $user->usu_senha;
        header('location: index.php');

       
    
}
    }
?>
       

   
</div>
</body>
</html>