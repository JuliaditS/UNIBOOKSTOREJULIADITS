<?php
include 'include/config.php';
include 'include/header.php';
$pengadaan = "active";
include 'include/navbar.php';
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-6 col-md-9">
            <div class="tbhdata__search">
                <a href="aksi/cetak.php" class="btn btn-dark d-inline">Print Laporan</a>
            </div>
        </div>
    </div>
</div>
<!-- Table -->
<div class="container mt-3">
    <table class="table table-striped table-paginate">
        <thead>
            <tr>
                <th class="col-md-2">No</th>
                <th class="col-md-2">ID Buku</th>
                <th class="col-md-2">Kategori</th>
                <th class="col-md-2">Nama Buku</th>
                <th class="col-md-2">Harga</th>
                <th class="col-md-2">Stok</th>
                <th class="col-md-2">Penerbit</th>
            </tr>
        </thead>
        <!-- ISI -->
        <tbody id="myTable">
            <?php
                $db = dbConnect();
                $tabel = 'tabel_buku';
                $sql = "SELECT * FROM tabel_Buku WHERE Stok <= 10";
                $res = $db->query($sql);
                $databaris = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
                $i = +1;
                foreach ($databaris as $data) { ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= htmlspecialchars($data['ID_Buku']); ?></td>
                        <td><?= htmlspecialchars($data['Kategori']); ?></td>
                        <td><?= htmlspecialchars($data['Nama']); ?></td>
                        <td><?= formatUang(htmlspecialchars($data['Harga'])); ?></td>
                        <td><?= htmlspecialchars($data['Stok']); ?></td>
                        <td><?= htmlspecialchars($data['Penerbit']); ?></td>
                    </tr>
                <?php $i++;
                } ?>
        </tbody>
    </table>
</div>
<script>
$(document).ready(function(){
    $('.table-paginate').dataTable();
});


</script>

<?php
include 'include/footer.php'
?>