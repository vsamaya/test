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
                    include 'menu.php';
                    echo "<form method=POST action=tampil_cari.php>
                    Kata kunci nama : <input type=text name=kunci> 
                    <input type=submit name=submit value=kirim>
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