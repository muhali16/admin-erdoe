<?php 
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
  exit;
}
// koneksi database
require 'src/functions.php';
// mengambil data dari tabel database
$data = query("SELECT * FROM datawarga");

// tombol cari
if(isset($_POST["cari"])){
  $data = cari($_POST["keyword"]);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- My Css -->
    <link rel="stylesheet" href="/css/style.css">
    <title>PanDoe - Admin</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark hilang">
      <div class="container">
          <a class="navbar-brand" href="#">Pangkalan Data Erdoe</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" href="src/logout.php">LOGOUT</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div style="margin: 20px 0 15px 23px">
      <h1>Data Warga Erdoe - Dashboard Admin</h1>
      <hr>
      <div class="float-start hilang">
        <a href="src/tambah.php"><img class="plus" width="40px" src="img/plus.png" alt="Tambah Data"></a>
      </div>
    <!-- Search -->
    <form action="" method="post">
      <div class="input-group w-25 me-4 float-end mb-3 hilang">
          <input type="text" name="keyword" class="form-control" placeholder="Masukan nama" autofocus autocomplete="off">
          <button class="btn btn-outline-secondary" type="submit" name="cari" id="cari">Cari</button>
      </div>
    </form>
    </div>
    <!-- Data Tables -->
    <table class="table mx-3 caption-top ml-8">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th class="hilang" scope="col">Action</th>
          <th scope="col">Nama</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">Tempat Lahir</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Usia</th>
          <th scope="col">Alamat</th>
          <th scope="col">Status Perkawin</th>
          <th scope="col">Tempat Tinggal</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; ?>
        <?php foreach($data as $row) : ?>
        <tr>
          <th scope="row"><?= $i; ?></th>
          <td class="hilang"><a href="src/update.php?id=<?= $row["id"]; ?>">Edit</a> | <a href="src/remove.php?id=<?= $row["id"]; ?>">Del</a></td>
          <td><?= $row["nama"]; ?></td>
          <td><?= $row["jenisKelamin"]; ?></td>
          <td><?= $row["tempatLahir"]; ?></td>
          <td><?= $row["tanggalLahir"]; ?></td>
          <td><?= $row["usia"]; ?></td>
          <td><?= $row["alamat"]; ?></td>
          <td><?= $row["statusKawin"]; ?></td>
          <td><?= $row["statusTinggal"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>