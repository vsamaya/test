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
                    include 'menu.php';
                } else{
                    echo "password salah";
                }
            }
        }
        else { 
            echo "username tidak ditemukan";
        }

    } else {
    //cari uname dalam tabel
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    $md5_pass=md5($pass);
    $sql = "SELECT * FROM user WHERE username='$uname'";
    $hasil=$conn->query($sql);
    if($hasil->num_rows>0){
        while($data=$hasil->fetch_assoc()){
            if($data['password']==$md5_pass){
                include 'menu.php';
                echo "login berhasil";
                $_SESSION['uname']=$uname;
                $_SESSION['pass']=$md5_pass;
            } else{
                echo "password salah";
            }
        }
    }
    else { 
        echo "<a href='login.php'>silakan login</a>";
    }
}
    
?>