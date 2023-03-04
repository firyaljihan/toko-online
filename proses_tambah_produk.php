<?php
include "connect.php";
if ($_POST) {

    $namaProduk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $foto = $_POST['foto'];

    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif', 'JPG');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (empty($namaProduk)) {
        echo "<script>alert('nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } elseif (empty($deskripsi)) {
        echo "<script>alert('deskripsi tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } elseif (empty($harga)) {
        echo "<script>alert('harga tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } elseif (empty($filename)) {
        echo "<script>alert('foto tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } else {
        if (!in_array($ext, $ekstensi)) {
            header("location:tambah_produk.php?alert=gagal_ekstensi");
        } else {
            if ($ukuran < 1044070) {
                $xx = $filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], 'foto_produk/' . '' . $filename);
                mysqli_query($conn, "INSERT INTO produk VALUES(NULL,'$namaProduk','$deskripsi','$harga','$xx')");
                echo "<script>alert('Sukses menambahkan produk');location.href='tambah_produk.php';</script>";
            } else {
                echo "<script>alert('File melebihi kapasitas yang ditentukan');location.href='tambah_produk.php';</script>";
            }
        }


        if ($insert) {
            echo "<script>alert('Sukses menambahkan produk');location.href='tambah_produk.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan produk');location.href='tambah_produk.php';</script>";
        }
    }
}