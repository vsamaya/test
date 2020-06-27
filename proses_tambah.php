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
                    include "setting.php";
                    echo "<br><br>";
                    //menerima posting nama
                    $id=$_GET['id'];
                    $kode_mk=$_GET['mk'];
                    //membuat query
                    $sql="INSERT INTO krs(nim,kode_mk,smt,ta) VALUES ('$id','$kode_mk','$smt','$ta')";
                    if($conn->query($sql)==TRUE) echo "mata kuliah berhasil ditambahkan<br><br>";
                    else echo "mata kuliah gagal ditambahkan<br><br>";

                    echo "<a href=krs.php?id=".$id.">kembali</a>";
                
                
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