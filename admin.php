<?php
//Menambahkan Koneksi, header dan navbar
include 'include/config.php';
include 'include/header.php';
$admin = "active";
include 'include/navbar.php';
?>

<!-- Cari Text -->
<div class="container">
    <div class="row mt-5">
        <div class="col-6 col-md-9">
            <button type="button" class="btn btn-dark d-inline" data-bs-toggle="modal" data-bs-target="#<?=$_GET['tabel'];?>">
                Tambah
            </button>
            <div class="modal fade" id="tabel_Buku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                        <form action="aksi/tambah.php?tabel=buku" method="POST" id="form_buku">
                            <div class="modal-body">

                                <label>ID Buku</label>
                                <input type="text" name="ID_Buku" id="id_Buku" class="form-control" placeholder="ID Buku"  required="required" maxlength="6">
                                <label>Kategori</label>
                                <input type="text" name="Kategori" id="kategori" class="form-control" placeholder="Kategori"  required="required" maxlength="25">
                                <label>Nama Buku</label>
                                <input type="text" name="Nama" id="nama" class="form-control" placeholder="Nama Buku"  required="required" maxlength="255">
                                <label>Harga</label>
                                <input type="number" min="0" name="Harga" id="harga" class="form-control format-angka" placeholder="Harga"  required="required" maxlength="11" max=99999999999>
                                <label>Stok</label>
                                <input type="number" min="1" name="Stok" id="stok" class="form-control" placeholder="Stok"  required="required" maxlength="9" max=999999999>
                                <label>Penerbit</label>
                                <select name="Penerbit" id="penerbit" class="form-control">
                                    <?php 
                                    $databaris = getData("tabel_Penerbit");
                                    foreach ($databaris as $data) {
                                        ?>
                                        <option value="<?= $data['Nama']; ?>"><?= $data['Nama'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                

                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="TblSimpan" class="btn btn-primary" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="tabel_Penerbit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Penerbit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                        <form action="aksi/tambah.php?tabel=penerbit" method="POST" id="form_penerbit">
                            <div class="modal-body">

                                <label>ID Penerbit</label>
                                <input type="text" name="ID_Penerbit" id="id_penerbit" class="form-control" placeholder="ID Penerbit"  required="required" maxlength="6">
                                <label>Nama</label>
                                <input type="text" name="Nama" id="nama" class="form-control" placeholder="Nama Buku"  required="required" maxlength="100">
                                <label>Alamat</label>
                                <textarea name="Alamat" id="alamat" class="form-control" placeholder="Alamat" required="required"></textarea>
                                <label>Kota</label>
                                <input type="text" name="Kota" id="kota" class="form-control" placeholder="Kota"  required="required" maxlength="30">
                                <label>Telepon</label>
                                <input type="text" name="Telepon" id="telepon" class="form-control" placeholder="Telepon"  required="required" maxlength="13">

                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="TblSimpan" class="btn btn-primary" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table -->
<div class="container mt-3">
    <table class="table table-striped table-paginate">
        <thead>
            <?php
                $tabel = $_GET['tabel'];
                if($tabel === 'tabel_Buku') {
                    ?>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-1">ID Buku</th>
                        <th class="col-md-2">Kategori</th>
                        <th class="col-md-2">Nama Buku</th>
                        <th class="col-md-2">Harga</th>
                        <th class="col-md-1">Stok</th>
                        <th class="col-md-2">Penerbit</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                    <?php
                } else {
                    ?>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-1">ID Penerbit</th>
                        <th class="col-md-2">Nama</th>
                        <th class="col-md-2">Alamat</th>
                        <th class="col-md-2">Kota</th>
                        <th class="col-md-1">Telepon</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                    <?php
                }
            ?>
            
        </thead>
        <!-- ISI -->
        <tbody id="myTable">
            <?php
                $databaris = getData($tabel); // ambil seluruh baris data
                $i = +1;
                foreach ($databaris as $data) {
                    if ($tabel === 'tabel_Buku') {
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= htmlspecialchars($data['ID_Buku']); ?></td>
                            <td><?= htmlspecialchars($data['Kategori']); ?></td>
                            <td><?= htmlspecialchars($data['Nama']); ?></td>
                            <td><?= formatUang(htmlspecialchars($data['Harga'])); ?></td>
                            <td><?= htmlspecialchars($data['Stok']); ?></td>
                            <td><?= htmlspecialchars($data['Penerbit']); ?></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$data["ID_Buku"]; ?>">
                                    <i class='bx bx-edit'></i>
                                </button>
                                <div class="modal fade" id="edit<?=$data["ID_Buku"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    
                                                </button>
                                            </div>
                                            <form action="aksi/edit.php?tabel=buku" method="POST" id="form_edit_buku">
                                                <div class="modal-body">

                                                <label>ID Buku</label>
                                                <input type="text" name="ID_Buku" id="id_buku" class="form-control" placeholder="ID_Buku"  required="required" value="<?=$data['ID_Buku'];?>" disabled>
                                                <input type="hidden" name="ID_Buku" id="id_buku" class="form-control" placeholder="ID_Buku"  required="required" value="<?=$data['ID_Buku'];?>">
                                                <label>Kategori</label>
                                                <input type="text" name="Kategori" id="kategori" class="form-control" placeholder="Kategori"  required="required" value="<?=$data['Kategori'];?>" maxlength="25">
                                                <label>Nama Buku</label>
                                                <input type="text" name="Nama" id="nama" class="form-control" placeholder="Nama Buku"  required="required" value="<?=$data['Nama'];?>" maxlength="255">
                                                <label>Harga</label>
                                                <input type="number" min="0" name="Harga" id="harga" class="form-control format-angka" placeholder="Harga"  required="required" value="<?=$data['Harga'];?>" maxlength="11">
                                                <label>Stok</label>
                                                <input type="number" min="1" name="Stok" id="stok" class="form-control" placeholder="Stok"  required="required" value="<?=$data['Stok'];?>" maxlength="9">
                                                <label>Penerbit</label>
                                                <select name="Penerbit" id="penerbit" class="form-control">
                                                    <?php 
                                                    $databaris = getData("tabel_Penerbit");
                                                    foreach ($databaris as $data1) {
                                                        ?>
                                                        <option value="<?= $data1['Nama']; ?>" <?php if ($data['Penerbit'] === $data1['Nama']){ echo "selected"; } ?>><?= $data1['Nama'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>


                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="TblUpdate" class="btn btn-primary" value="Simpan">
                                                    <input type="reset" class="btn btn-primary" value="Reset">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <a href="aksi/delete.php?tabel=true&&ID_Buku=<?=base64_encode(openssl_encrypt($data["ID_Buku"], "AES-128-CTR", "GeeksforGeeks", $options = 0, "1234567891011121")); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                            </td>
                        </tr>
                        <?php
                    } else {
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= htmlspecialchars($data['ID_Penerbit']); ?></td>
                            <td><?= htmlspecialchars($data['Nama']); ?></td>
                            <td><?= htmlspecialchars($data['Alamat']); ?></td>
                            <td><?= htmlspecialchars($data['Kota']); ?></td>
                            <td><?= htmlspecialchars($data['Telepon']); ?></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$data["ID_Penerbit"]; ?>">
                                    <i class='bx bx-edit'></i>
                                </button>
                                <div class="modal fade" id="edit<?=$data["ID_Penerbit"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Penerbit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    
                                                </button>
                                            </div>
                                            <form action="aksi/edit.php?tabel=penerbit" method="POST" id="form_edit_penerbit">
                                                <div class="modal-body">

                                                <label>ID Penerbit</label>
                                                <input type="text" name="ID_Penerbit" id="id_penerbit" class="form-control" placeholder="ID_Penerbit"  required="required" value="<?=$data['ID_Penerbit'];?>" disabled>
                                                <input type="hidden" name="ID_Penerbit" id="id_penerbit" class="form-control" placeholder="ID_Penerbit"  required="required" value="<?=$data['ID_Penerbit'];?>">
                                                <label>Nama</label>
                                                <input type="text" name="Nama" id="nama" class="form-control" placeholder="Nama Buku"  required="required" value="<?=$data['Nama'];?>" maxlength="100">
                                                <label>Alamat</label>
                                                <textarea name="Alamat" id="alamat" class="form-control" placeholder="Alamat" required="required"><?=$data['Alamat'];?></textarea>
                                                <label>Kota</label>
                                                <input type="text" name="Kota" id="kota" class="form-control" placeholder="Kota"  required="required" value="<?=$data['Kota'];?>" maxlength="30">
                                                <label>Telepon</label>
                                                <input type="text" name="Telepon" id="telepon" class="form-control" placeholder="Telepon"  required="required" value="<?=$data['Telepon'];?>" maxlength="13">


                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="TblUpdate" class="btn btn-primary" value="Simpan">
                                                    <input type="reset" class="btn btn-primary" value="Reset">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <a href="aksi/delete.php?tabel=false&&ID_Penerbit=<?=base64_encode(openssl_encrypt($data["ID_Penerbit"], "AES-128-CTR", "GeeksforGeeks", $options = 0, "1234567891011121")); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
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