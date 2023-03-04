<?php
if($_POST){
    $id_pelanggan=$_POST['id_pelanggan'];
    $id_petugas=$_POST['id_petugas'];
    $id_produk=$_POST['id_produk'];
    $tgl_transaksi=$_POST['tgl_transaksi'];
    if(empty($id_pelanggan)){
        echo "<script>alert('id_pelanggan tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    } elseif(empty($id_petugas)){
        echo "<script>alert('id_petugas tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    } elseif(empty($id_produk)){
        echo "<script>alert('id_produk tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    }elseif(empty($tgl_transaksi)){
        echo "<script>alert('tgl_transaksi tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    }else {
        include "connect.php";
        $insert=mysqli_query($conn,"insert into transaksi (id_pelanggan, id_petugas, id_produk, tgl_transaksi) value ('".$id_pelanggan."','".$id_petugas."','".$id_produk."', '".$tgl_transaksi."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan transaksi');location.href='tambah_transaksi.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan transaksi');location.href='tambah_transaksi.php';</script>";
        }
    }
}
?>