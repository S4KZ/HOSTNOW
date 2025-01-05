<?php
session_start();
include('includes/config.php');

$res_id_quarto = $_SESSION['id_quarto'];
$res_dt_reserva = $_SESSION['entradadt'];
$res_dt_saida = $_SESSION['saidadt'];
$res_total_pag = $_SESSION['total'];
$res_nome = $_SESSION['hospede'];
$res_forma_pag = $_SESSION['formpag'];

$sql = "INSERT INTO hubsap45_bd_hostnow.tbl_reserva(res_nome, res_dt_reserva, res_dt_saida, res_id_quarto, res_forma_pag, res_total_pag) 
VALUES('$res_nome','$res_dt_reserva','$res_dt_saida','$res_id_quarto','$res_forma_pag','$res_total_pag')";

$row = $conect->query($sql);

$update = "UPDATE hubsap45_bd_hostnow.tbl_quarto SET qua_status = 'Ocupado' WHERE id_quarto = '$res_id_quarto';";
$up = $conect->query($update);


header('location: reservar.php');
?>