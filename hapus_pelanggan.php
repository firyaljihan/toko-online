<?php 
    if($_GET['id_pelanggan']){
        include "connect.php";
        $qry_hapus_pelanggan=mysqli_query($conn,"delete from pelanggan where id_pelanggan='".$_GET['id_pelanggan']."'");
        if($qry_hapus_pelanggan){
            echo "<script>alert('Sukses hapus pelanggan');location.href='tampil_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus pelanggan');location.href='tampil_pelanggan.php';</script>";
        }
    }
?>