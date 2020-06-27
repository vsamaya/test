<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pemrograman_web";
    $conn = new mysqli($servername,$username,$password,$dbname);

    //echo "$_SESSION[uname] $_SESSION[pass]";
    if(isset($_SESSION['uname']) AND isset($_SESSION['pass'])){
        $sql = "SELECT * FROM user WHERE username='$_SESSION[uname]'";
        $hasil=$conn->query($sql);
        if($hasil->num_rows>0){
            while($data=$hasil->fetch_assoc()){
                if($data['password']==$_SESSION['pass']){
//---------------------copy kan program di sini
                    include "menu.php";
                    echo "
                    <form method=POST action=proses.php>
                    <table border=0>
                    <tr><td>NIM</td><td>:</td><td><input type=int name=nim></td></tr>
                    <tr><td>Nama</td><td>:</td><td><input type=text name=nama></td></tr>
                    <tr><td>Alamat</td><td>:</td><td><input type=text name=alamat></td></tr>
                    <tr><td>Prodi</td><td>:</td><td><input type=text name=prodi></td></tr>
                    <tr><td>Angkatan</td><td>:</td><td><input type=text name=angkatan></td></tr>
                    <tr><td>Jenis Kelamin</td><td>:</td><td><select name=jk>";
                    $sql_jk = "SELECT * FROM jenis_kelamin";
                    $jk=$conn->query($sql_jk);
                    while ($data_jk=$jk->fetch_assoc()){
                        echo "<option value=".$data_jk['kode_jk'].">".$data_jk['jk']."</option>";
                    }
                    
                    echo "</select></td></tr>
                    <tr><td><input type=submit name=submit value=kirim></td></tr></table>
                    </form>";
                
                
//--------------------sampai sini

                } else{
                    echo "password salah";
                }
            }
        }
        else { 
            echo "username tidak ditemukan";
        }
    } else include 'login.php';
    
?>