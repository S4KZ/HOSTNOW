<?php
include_once('includes/config.php');

$pes_estado = $_GET['pes_estado'];
echo $pes_estado;


$resultado = "SELECT * FROM hubsap45_bd_hostnow.tbl_cidade WHERE cid_id_uf = '{$pes_estado}' ORDER BY cid_Nome ASC";
   $resultado = mysqli_query($conect, $resultado);
   while($row = mysqli_fetch_assoc($resultado)) { ?>
<option <?php if(isset($_POST['pes_estado']) &&  $_POST['estado']) echo 'selected'; ?> 
value= "<?php echo $row['id_cid']; ?>"> <?php echo $row['cid_nome']; ?> 
</option> <?php
   }  
   


?>