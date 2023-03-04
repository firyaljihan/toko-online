<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    body{
      background-color: #4682b4;
      margin-top: 60px;
      }
  </style>
</head>
<body>
<?php
    include "connect.php";
    $qry_get_produk=mysqli_query($conn,"select * from produk where id_produk = '".$_GET['id_produk']."'");
    $dt_produk=mysqli_fetch_array($qry_get_produk);
?>
<div class="container">
  <div class="card">
    <div class="card-header bg-primary text-white">Ubah Produk</div>
    <div class="card-body">
    <form action="proses_ubah_produk.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_produk" value= "<?=$dt_produk['id_produk']?>">
        <div class="form-group">
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" value= "<?=$dt_produk['nama_produk']?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Deskripsi</label>
          <input type="text" name="deskripsi" value= "<?=$dt_produk['deskripsi']?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Harga</label>
          <input type="text" name="harga" value= "<?=$dt_produk['harga']?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Foto Produk</label>
          <input type="file" name="file" value= "<?=$dt_produk['foto_produk']?>" class="form-control">
        </div>
        <a href="tampil_produk.php" class="btn btn-danger" type="submit" value="KEMBALI">Kembali</a>
        <input type="submit" name="simpan" value="Ubah Produk" class="btn btn-primary">
      </form>
    </div>
  </div>
</div>
</body>
</html>