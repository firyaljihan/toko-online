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
        <h1>DATA PETUGAS</h1>
        <form method="POST" action="tampil_petugas.php" class="d-flex">
        </form>  
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">NAMA PETUGAS</th>
              <th scope="col">LEVEL</th>
              <th scope="col">USERNAME</th>
              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include "connect.php";
           
            $query_petugas = mysqli_query($conn, "select * from petugas");
            $no=0;
            while($data_petugas=mysqli_fetch_array($query_petugas)){
            $no++;
            ?>
            
            <tr>
              <td><?=$no?></td>
              <td><?=$data_petugas['nama_petugas']?></td>
              <td><?=$data_petugas['level']?></td>
              <td><?=$data_petugas['username']?></td>
              <td>
                <a href="ubah_petugas.php?id_petugas=
                <?=$data_petugas['id_petugas']?>" class="btn btn-success">Ubah</a>
                <a href="hapus_petugas.php?id_petugas=
                <?=$data_petugas['id_petugas']?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?'")>Hapus</a>
              </td>
            </tr>
            <?php 
            } 
            ?>
          </tbody>
        </table>
        <a href="tambah_petugas.php" type="button" class="btn btn-primary">Tambah
      
  
</body>
</html>