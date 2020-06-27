<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">KRS Mahasiswa</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="input.php">Tambah data</a></li>
      <li><a href="tampil.php">Tampil data </a></li>
      <li><a href="cari.php">Cari data</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
</body>
</html>

<!-- <?php
    echo "<a href='input.php'> Tambah data </a>
      ||
      <a href='tampil.php'> Tampil data </a>
      || 
      <a href='cari.php'> Cari data </a>
      ||
      <a href='logout.php'>Logout</a> <br>";


?> -->