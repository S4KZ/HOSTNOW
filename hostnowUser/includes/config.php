<?php 

//escola10.66.82.94
/*
define('HOST', 'galacticabsg');
define('USER', 'jonhson');
define('PASS', '123456');
define('BASE', 'hubsap45_bd_hostnow');
*/

//casa

define('HOST', 'br612.hostgator.com.br');
define('USER', 'hubsap45_hostnow');
define('PASS', 'hostnow2023');
define('BASE', 'hubsap45_bd_hostnow');


$conect = new MySQLi(HOST, USER, PASS, BASE);
/*
if($conect->connect_errno){
    echo "erro";
}else{
    echo "sucesso   ";
}
*/
 ?>