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
                    $kunci_nama = $_POST['kunci'];
                    $sql="SELECT * FROM mahasiswa WHERE nama LIKE '%$kunci_nama%'";
                    $hasil=$conn->query($sql);
                    if($hasil->num_rows>0){
                        //menampilkan data tiap baris
                        echo "<table border=1><tr><th>NIM</th><th>Nama</th><th>Alamat</th><th>Angkatan</th><th>Program Studi</th><th>Jenis Kelamin</th><th>Proses</th></tr>";
                        while($data=$hasil->fetch_assoc()){
                        
                            echo "<tr><td>".$data['nim']."</td><td>".$data['nama']."</td><td>".$data['alamat']."</td><td>".$data['angkatan']."</td><td>".$data['prodi']."</td><td>".$data['jenis_kelamin']."</td><td><a href=edit.php?id=".$data['nim'].">edit</a></td></tr>" ;
                            
                        }
                        echo "</table>";
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