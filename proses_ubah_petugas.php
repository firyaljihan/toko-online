<?php
if($_POST){
    $id_petugas=$_POST['id_petugas'];
    $nama=$_POST['nama_petugas'];
    $level=$_POST['level'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if(empty($nama)){
        echo "<script>alert('nama  tidak boleh kosong');location.href='tambah_petugas.php';</script>";

    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } else {
        include "connect.php";
        if(empty($password)){
            $update=mysqli_query($conn,"update petugas set nama_petugas='".$nama."',level='".$level."',username='".$username."' ") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update petugas');location.href='tampil_petugas.php';</script>";
            } else {
                echo "<script>alert('Gagal update petugas');location.href='ubah_petugas.php?id_petugas=".$id_petugas."';</script>";
            }
        } else {
            $update=mysqli_query($conn,"update petugas set nama_petugas='".$nama."',level='".$level."', username='".$username."', password='".md5($password)."' where id_petugas = '".$id_petugas."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update petugas');location.href='tampil_petugas.php';</script>";
            } else {
                echo "<script>alert('Gagal update petugas');location.href='ubah_petugas.php?id_petugas=".$id_petugas."';</script>";
            }
        }
        
    } 
}
?>
