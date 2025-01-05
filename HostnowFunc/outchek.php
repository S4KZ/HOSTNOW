<?php
include("includes/config.php");
session_start();
if(!isset($_SESSION['email'])){
    
    header('Location: login.php');
}

/*
$hos_nome =  $_SESSION['hos_nome'];
$res_dt_reserva = $_SESSION['res_dt_reserva'];
$res_dt_saida = $_SESSION['res_dt_saida'];
$res_forma_pag = $_SESSION['res_forma_pag'];
$res_total_pag = $_SESSION['res_total_pag'];
$res_qtd_dias = $_SESSION['res_qtd_dias'];
*/
$res_id_quarto = $_SESSION['res_id_quarto'];
$id_hospedagem = $_SESSION['id_hospedagem'];
$id_reserva = $_SESSION['id_reserva'];
$id_hospede = $_SESSION['id_hospede'];
$hos_id_usu = $_SESSION['hos_id_usu'];

/*
echo $hos_nome;
echo $res_dt_reserva;
echo $res_dt_saida;
echo $res_forma_pag;  
echo $res_total_pag;
echo $res_qtd_dias;
*/
echo $res_id_quarto . ' Quarto<br>';
echo $id_hospedagem . ' Hospedagem<br>';
echo $id_reserva . ' Reserva<br>';
echo $id_hospede . ' hospede<br>';
echo $hos_id_usu . ' usuario <br>';

   $quarto = "UPDATE hubsap45_bd_hostnow.tbl_quarto
   SET qua_status = 'Livre'
   WHERE id_quarto = $res_id_quarto";

    $row1 = $conect->query($quarto);
   


   $hospedagem = "DELETE FROM hubsap45_bd_hostnow.tbl_hospedagem 
   WHERE id_hospedagem = '$id_hospedagem'";
    $row2 = $conect->query($hospedagem);
  


    $hospede = "UPDATE hubsap45_bd_hostnow.tbl_hospede SET hos_num_qua = null 
    WHERE hos_id_usu = '$hos_id_usu'";
    $row3 = $conect->query($hospede);
 

    header('location: checkout.php');
?>