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

                     //menerima posting nama
                    $nama=$_POST['nama'];
                    $alamat = $_POST['alamat'];
                    $nim = $_POST['nim'];
                    $prodi = $_POST['prodi'];
                    $angkatan = $_POST['angkatan'];
                    $jk = $_POST['jk'];
                    echo "Nama : $nama<br>";
                    echo "Alamat : $alamat<br>";
                    echo "Prodi : $prodi<br>";
                    echo "Angkatan : $angkatan<br>";
                    echo "Jenis Kelamin : $jk<br>";

                    // if($conn) echo "berhasil";
                    // else echo "gagal";
                    
                    //membuat query
                    $sql="UPDATE mahasiswa SET nama='$nama', alamat='$alamat', prodi='$prodi', angkatan='$angkatan', jenis_kelamin='$jk' WHERE nim='$nim'";
                    //mysqli_query($conn,$sql);
                    if($conn->query($sql)===TRUE)echo "insert berhasil";
                    else echo "insert gagal";
                
                
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