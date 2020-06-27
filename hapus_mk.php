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
                    $krs=$_GET['krs'];
                    $id=$_GET['id'];
                    //membuat query
                    $sql="DELETE FROM krs WHERE kode_krs='$krs'";
                    if($conn->query($sql)==TRUE) echo "mata kuliah berhasil dihapus<br><br>";
                    else echo "mata kuliah gagal dihapus<br><br>";
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