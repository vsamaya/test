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
                    echo "<br>";
                    //menerima posting nama
                    $id=$_GET['id'];
                    //membuat query
                    $sql="SELECT * FROM krs JOIN mata_kuliah WHERE krs.nim='$id' and krs.kode_mk=mata_kuliah.kode_mk";
                    $hasil=$conn->query($sql);
                    include "setting.php";
                    echo "Semester : ".$smt."<br>";
                    echo "Tahun ajaran : ".$ta."<br><br>";
                    echo "<a href=tambah_mk.php?id=".$id.">Tambah mata kuliah</a><br>";
                    if($hasil->num_rows>0){
                        //menampilkan data tiap baris
                    // echo "<table border=1><tr><th>NIM</th><th>Nama</th><th>Alamat</th><th>Angkatan</th><th>Program Studi</th><th>Proses</th></tr>"
                    echo "Mata kuliah yang diambil:";
                    echo "<table border=1><tr><th>Mata Kuliah</th><th>sks</th><th>Proses</th></tr>" ;
                    while($data=$hasil->fetch_assoc()){
                        // $sql_matkul="SELECT * FROM mata_kuliah WHERE '$data[kode_mk]'=kode_mk";
                        // $matkul=$conn->query($sql_matkul);

                        echo "<tr><td>".$data['nama_mk']."</td><td>".$data['sks']."</td><td><a href=hapus_mk.php?krs=".$data['kode_krs']."&id=".$id.">hapus</a></tr>";

                        
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