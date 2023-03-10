<?php 
    include "header.php";
?>
<h2>Histori Pembelian Produk</h2>



<table class="table table-hover table-striped">
    <thead>
        <th>NO</th><th>Tanggal Bayar</th><th>Tanggal Sampai</th><th>Nama Produk</th><th>Status</th><th>Aksi</th>
    </thead>
    <tbody>
        <?php 

        include "connect.php";
        $qry_histori=mysqli_query($conn,"select * from pembelian_produk order by id_pembelian_produk desc");
        $no=0;
        while($dt_histori=mysqli_fetch_array($qry_histori)){
           
            $no++;
            //menampilkan produk yang dipinjam
            $produk_dibeli="<ol>";
            $qry_produk=mysqli_query($conn,"select * from  detail_pembelian_produk join produk on produk.id_produk=detail_pembelian_produk.id_produk where id_pembelian_produk = '".$dt_histori['id_pembelian_produk']."'");
            
            while($dt_produk=mysqli_fetch_array($qry_produk)){
                $produk_dibeli.="<li>".$dt_produk['nama_produk']."</li>";
            }
            $produk_dibeli.="</ol>";
            //menampilkan status sudah sampai atau belum
            $qry_cek_sampai=mysqli_query($conn,"select * from produk_sampai where id_pembelian_produk = '".$dt_histori['id_pembelian_produk']."'");
            if(mysqli_num_rows($qry_cek_sampai)>0){
                $dt_sampai=mysqli_fetch_array($qry_cek_sampai);
                $status_sampai="<label class='alert alert-success'>Sudah sampai</label>";
                $button_sampai="";
            } else {
                $status_sampai="<label class='alert alert-danger'>Belum sampai</label>";
                $button_sampai="<a href='sampai.php?id=".$dt_histori['id_pembelian_produk']."' class='btn btn-warning' onclick='return confirm(\"apakah produk sudah sampai?\")'>Sampai</a>";
            }
                
            ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$dt_histori['tanggal_bayar']?></td>
                    <td><?=$dt_histori['tanggal_sampai']?></td>
                    <td><?=$produk_dibeli?></td>
                    <td><?=$status_sampai?></td>
                    <td><?=$button_sampai?></td>
                </tr>
            <?php
            }
            
            ?>
        </tbody>
</table>
<?php 
    include "footer.php";
?>