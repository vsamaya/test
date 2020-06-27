<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pemrograman_web";
function konek($servername,$username,$password,$dbname){
    $conn = new mysqli($servername,$username,$password,$dbname);
}
?>