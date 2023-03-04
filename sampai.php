<?php 
if($_GET['id']){
    include "connect.php";
    $sampai = date('Y-m-d');
    $id_pembelian_produk=$_GET['id'];
    
    //untuk mengupdate tanggal sampai
    $update = mysqli_query($conn, "update pembelian_produk set tanggal_sampai = '".$sampai."' where id_pembelian_produk = '".$id_pembelian_produk."'");

    if(strtotime($dt_bayar['tanggal_sampai'])>=strtotime(date('Y-m-d'))){
    } else{
        $tanggal_sampai = new DateTime();
    }
    mysqli_query($conn, "insert into produk_sampai (id_pembelian_produk, tanggal_sampai) value('".$id_pembelian_produk."','".date('Y-m-d')."')");
    header('location: histori_pembelian.php');
}
?>