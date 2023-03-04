<?php
if ($_POST) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $user = $_POST['user'];
    if (empty($username)) {
        echo "<script> alert('Username tidak boleh kosong'); location.href='login.php'; </script>";
    } elseif (empty($pass)) {
        echo "<script> alert('Password tidak boleh kosong'); location.href='login.php'; </script>";
    } elseif ($user == 'kosong') {
        echo "<script> alert('login sebagai tidak boleh kosong'); location.href='login.php'; </script>";
    } else {
        if ($user == 'pelanggan') {
            include "connect.php";
            $qry_login = mysqli_query($conn, "select * from pelanggan where username = '".$username."' and password = '".md5($pass)."'");
            if (mysqli_num_rows($qry_login) > 0) {
                $dt_login = mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id_pelanggan'] = $dt_login['id_pelanggan'];
                $_SESSION['username'] = $dt_login['username'];
                $_SESSION['password'] = $dt_login['password'];
                $_SESSION['nama'] = $dt_login['nama'];
                $_SESSION['status_login_pelanggan']=true;
                header("location:home_pelanggan.php");
            } else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
            }
        } elseif ($user == 'petugas') {
            include "connect.php";
            $qry_login = mysqli_query($conn, "select * from petugas where username = '".$username."' and password = '".md5($pass)."'");
            if (mysqli_num_rows($qry_login) > 0) {
                $dt_login = mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['username'] = $dt_login['username'];
                $_SESSION['password'] = $dt_login['password'];
                $_SESSION['nama_petugas'] = $dt_login['nama_petugas'];
                $_SESSION['status_login_petugas'] = true;
                header("location: home.php");
            } else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
            }
        }
    }
}