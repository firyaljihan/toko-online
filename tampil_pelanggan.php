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
        <h1>DATA PELANGGAN</h1>
        <form method="POST" action="tampil_pelanggan.php" class="d-flex">
        </form>  
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">NAMA PELANGGAN</th>
              <th scope="col">ALAMAT</th>
              <th scope="col">TELEPON</th>
              <th scope="col">USERNAME</th>
              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include "connect.php";
           
            $query_pelanggan = mysqli_query($conn, "select * from pelanggan");
            $no=0;
            while($data_pelanggan=mysqli_fetch_array($query_pelanggan)){
            $no++;
            ?>
            
            <tr>
              <td><?=$no?></td>
              <td><?=$data_pelanggan['nama']?></td>
              <td><?=$data_pelanggan['alamat']?></td>
              <td><?=$data_pelanggan['telp']?></td> 
              <td><?=$data_pelanggan['username']?></td>  
              <td>
                <a href="ubah_pelanggan.php?id_pelanggan=
                <?=$data_pelanggan['id_pelanggan']?>" class="btn btn-success">Ubah</a>
                <a href="hapus_pelanggan.php?id_pelanggan=
                <?=$data_pelanggan['id_pelanggan']?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?'")>Hapus</a>
              </td>
            </tr>
            <?php 
            } 
            ?>
          </tbody>
        </table>
        <a href="tambah_pelanggan.php" type="button" class="btn btn-primary">Tambah
      
  
</body>
</html>