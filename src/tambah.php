<?php 
require 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
  exit;
}

// mengecek tombol submit
if(isset($_POST["submit"])){
    // cek data berhasil disubmit
    if(add($_POST) > 0){
      echo "
        <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = '../dashboard.php';
        </script>"  ;
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan!');
            document.location.href = '../dashboard.php';
        </script> ";
    }
};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- My Css -->
    <link rel="stylesheet" href="../css/style.css">
    <title>PanDoe - Admin</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
          <a class="navbar-brand" href="#">Pangkalan Data Erdoe</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" href="#">Home</a>
              <a class="nav-link pe-auto" href="../index.php">Data</a>
              <a class="nav-link" href="#">About</a>
              <a class="nav-link" href="#">Download</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div style="margin: 20px 0 15px 23px">
      <h1>Data Warga Erdoe - Dashboard Admin</h1>
      <hr>
      <form action="../dashboard.php">
        <button class="btn btn-primary" >Back</button>
      </form>
    </div>
    <!-- Form -->
    <form class="row g-4 container" method="post">
  <div class="col-md-6">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control" id="nama" required>
  </div>
  <div class="col-md-6">
  <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
    <select id="jenisKelamin" name="jenisKelamin" class="form-select required" >
      <option selected>Pilih</option>
      <option value="Pria">Pria</option>
      <option value="Wanita">Wanita</option>
    </select>
  </div>
  <div class="col-4">
    <label for="tempatLahir" class="form-label">Tempat Lahir</label>
    <input type="text" name="tempatLahir" class="form-control" id="tempatLahir" required>
  </div>
  <div class="col-4">
    <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
    <input type="text" name="tanggalLahir" class="form-control" id="tanggalLahir" placeholder="yyyy-mm-dd" required>
  </div>
  <div class="col-4">
    <label for="usia" class="form-label">Usia</label>
    <input type="text" name="usia" class="form-control" id="usia" required>
  </div>
  <div class="col-12">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text"  name="alamat" class="form-control" id="alamat" placeholder="Perumahan Telaga Murni, Jalan Merpati 1 Blok D16/33" required>
  </div>
  <div class="col-md-6">
    <label for="statusKawin" class="form-label">Status Pernikahan</label>
    <select id="statusKawin" name="statusKawin" class="form-select required">
      <option selected>Pilih</option>
      <option value="Menikah">Menikah</option>
      <option value="BelumMenikah">Belum Menikah</option>
    </select>
  </div>
  <div class="col-md-6">
  <label for="statusTinggal" class="form-label ">Status Tinggal</label>
    <select id="statusTinggal" name="statusTinggal" class="form-select required" >
      <option selected >Pilih</option>
      <option value="Sendiri" >Sendiri</option>
      <option value="OrangTua" >Bersama Orang Tua</option>
      <option value="Wali" >Bersama Wali</option>
    </select>
  </div>
  <div class="col-12">
    <button type="submit" name="submit" class="btn btn-primary" >Tambah</button>
  </div>
</form>
</body>
</html>