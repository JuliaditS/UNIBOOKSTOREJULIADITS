<?php
//Menambahkan Koneksi, header dan navbar
include 'include/config.php';
include 'include/header.php';
$index = "active";
include 'include/navbar.php';
?>
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
                $tabel = 'tabel_buku';
                $databaris = getData($tabel); // ambil seluruh baris data
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
//menambahkan footer
include 'include/footer.php'
?>