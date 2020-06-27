<?php
    include 'menu.php';
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pemrograman_web";
    $conn = new mysqli($servername,$username,$password,$dbname);

    //get data id
    $id=$_GET['id'];
    //membuat query
    $sql="SELECT * FROM mahasiswa WHERE nim='$id'";
    $hasil=$conn->query($sql);
    if($hasil->num_rows>0){
        //menampilkan data tiap baris
       // echo "<table border=1><tr><th>NIM</th><th>Nama</th><th>Alamat</th><th>Angkatan</th><th>Program Studi</th><th>Proses</th></tr>";
       echo "<form method=POST action=proses_edit.php>"; 
       while($data=$hasil->fetch_assoc()){
            echo "
            NIM : <input type=hidden name=nim value=".$data['nim'].">".$data['nim']."<br>
            Nama : <input type=text name=nama value=".$data['nama']."><br>
            Alamat : <input type=text name=alamat value=".$data['alamat']."><br>
            Prodi : <input type=text name=prodi value=".$data['prodi']."><br>
            Angkatan : <input type=text name=angkatan value=".$data['angkatan']."><br>
            Jenis Kelamin : <select name=jk>
                                <option value=".$data['jenis_kelamin'].">".$data['jenis_kelamin']."</option>
                                <option value=laki-laki>Laki-laki</option>
                                <option value=perempuan>Perempuan</option>
                            </select>
            <input type=submit name=submit value=kirim><br>
            ";
         
            //echo "<tr><td>".$data['nim']."</td><td>".$data['nama']."</td><td>".$data['alamat']."</td><td>".$data['angkatan']."</td><td>".$data['prodi']."</td><td><a href=edit.php?id=".$data['nim'].">edit</a></td></tr>" ;
            
        }
        echo "</form>";
       // echo "</table>";
    }
    // echo $id;
?>