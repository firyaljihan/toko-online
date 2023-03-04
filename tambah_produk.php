<?php
    include "header.php";
?>
    <main>
        <h3>Tambah Produk</h3>
        <form action="proses_tambah_produk.php" method="post" enctype="multipart/form-data">
            nama produk :

            <input type="text" name="nama_produk" value="" class="form-control">

            deskripsi produk :
            <input type="text" name="deskripsi" value="" class="form-control">

            harga produk :
            <input type="number" name="harga" value="" class="form-control">
            foto :
            <input type="file" name="foto" value="" class="form-control">
            <input type="submit" name="simpan" value="Tambah produk" class="btnbtn-primary">
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </main>
</body>

</html>