<?php 
    session_start();
    include "connect.php";
    $cart = @$_SESSION['cart'];
    if(count($cart)>0){         
    mysqli_query($conn,"insert into pembelian_produk (id_pelanggan,tanggal_bayar) value ('".$_SESSION['id_pelanggan']."','".date('Y-m-d')."')");


        $id=mysqli_insert_id($conn);

        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($conn,"insert into detail_pembelian_produk (id_pembelian_produk,id_produk,qty) 
            value('".$id."','".$val_produk['id_produk']."','".$val_produk['qty']."')");
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Anda berhasil membeli produk");location.href="histori_pelanggan.php"</script>';
    }
?>  