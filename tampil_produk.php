<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS ONLY -->
  <link href="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
  <?php
    include "header.php";
  ?>
  <br></br>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h1>DATA PRODUK</h1>
        <form method="POST" action="tampil_produk.php" class="d-flex">
        </form>  
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">FOTO PRODUK</th>
              <th scope="col">NAMA PRODUK</th>
              <th scope="col">DESKRIPSI</th>
              <th scope="col">HARGA</th>
              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include "connect.php";
           
            $query_produk = mysqli_query($conn, "select * from produk");
            $no=0;
            while($data_produk=mysqli_fetch_array($query_produk)){
            $no++;
            ?>
            
            <tr>
              <td><?=$no?></td>
              <td><img src="foto_produk/<?= $data_produk["foto_produk"];?>" width="50px"></td>  
              <td><?=$data_produk['nama_produk']?></td>
              <td><?=$data_produk['deskripsi']?></td>
              <td><?=$data_produk['harga']?></td>
              <td>
                <a href="ubah_produk.php?id_produk=
                <?=$data_produk['id_produk']?>" class="btn btn-success">Ubah</a>
                <a href="hapus_produk.php?id_produk=
                <?=$data_produk['id_produk']?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?'")>Hapus</a>
              </td>
            </tr>
            <?php 
            } 
            ?>
          </tbody>
        </table>
        <a href="tambah_produk.php" type="button" class="btn btn-primary">Tambah
      
  
</body>
</html>