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
                    echo "<br><br>";
                    //menerima posting nama
                    $id=$_GET['id'];
                    //membuat query
                    $sql="SELECT * FROM mata_kuliah";
                    $hasil=$conn->query($sql);
                    if($hasil->num_rows>0){
                        //menampilkan data tiap baris
                    // echo "<table border=1><tr><th>NIM</th><th>Nama</th><th>Alamat</th><th>Angkatan</th><th>Program Studi</th><th>Proses</th></tr>"
                    
                    echo "<table border=1><tr><th>Kode Mata Kuliah</th><th>Mata Kuliah</th><th>sks</th><th>Proses</th</tr>" ;
                    while($data=$hasil->fetch_assoc()){

                        echo "<tr><td>".$data['kode_mk']."</td><td>".$data['nama_mk']."</td><td>".$data['sks']."</td><td><a href=proses_tambah.php?mk=".$data['kode_mk']."&id=".$id.">tambahkan matkul</a></td></tr>";

                        
                    }
                    echo "</table>";
                    } else {
                        echo "Belum ada mata kuliah yang diambil";
                    }
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