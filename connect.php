<?php

if(session_id() == ''){
    session_start();
 }

$sname= ""; // Server name

$db_name = "arka_db"; // Database name

$unmae= "root"; // Username

$password = ""; // Password

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Conexion fallida!";

}
?>