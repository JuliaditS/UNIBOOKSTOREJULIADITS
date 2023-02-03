<?php
include '../include/config.php';

$db = dbConnect();
if($_GET['tabel']==="buku") {
    $ID_Buku = htmlspecialchars($_POST['ID_Buku']);
    $Kategori = htmlspecialchars($_POST['Kategori']);
    $Nama = htmlspecialchars($_POST['Nama']);
    $Harga = htmlspecialchars($_POST['Harga']);
    $Stok = htmlspecialchars($_POST['Stok']);
    $Penerbit = htmlspecialchars($_POST['Penerbit']);

    if (empty($ID_Buku)||empty($Kategori)||empty($Nama)||empty($Harga)||empty($Stok)||empty($Penerbit)){
        echo "
            <script>
                alert('Lengkapi semua Data');
                document.location.href = '../admin.php?tabel=tabel_Buku';
            </script>";
    } elseif(!is_numeric($Harga)&&!is_numeric($Stok)) {
        echo "
        <script>
            alert('Harga dan Stok harus berupa angka');
            document.location.href = '../admin.php?tabel=tabel_Buku';
        </script>";
    } else {
        $tambah = mysqli_query($db, "INSERT INTO tabel_Buku VALUES('$ID_Buku','$Kategori','$Nama','$Harga','$Stok','$Penerbit')");

        if ($tambah) {
            echo "
            <script>
                alert('Berhasil menambahkan Data');
                document.location.href = '../admin.php?tabel=tabel_Buku';
            </script>";
        } else {
            echo "
            <script>
                alert('Gagal menambahkan Data');
                document.location.href = '../admin.php?tabel=tabel_Buku';
            </script>";
        }
    }
} else {
    $ID_Penerbit = htmlspecialchars($_POST['ID_Penerbit']);
    $Nama = htmlspecialchars($_POST['Nama']);
    $Alamat = htmlspecialchars($_POST['Alamat']);
    $Kota = htmlspecialchars($_POST['Kota']);
    $Telepon = htmlspecialchars($_POST['Telepon']);

    if (empty($ID_Penerbit)||empty($Nama)||empty($Alamat)||empty($Kota)||empty($Telepon)){
        echo "
            <script>
                alert('Lengkapi semua Data');
                document.location.href = '../admin.php?tabel=tabel_Penerbit';
            </script>";
    } elseif(!is_numeric($Telepon)) {
        echo "
        <script>
            alert('Telepon harus berupa angka');
            document.location.href = '../admin.php?tabel=tabel_Penerbit';
        </script>";
    } else {
        $tambah = mysqli_query($db, "INSERT INTO tabel_penerbit VALUES('$ID_Penerbit','$Nama','$Alamat','$Kota','$Telepon')");

        if ($tambah) {
            echo "
            <script>
                alert('Berhasil menambahkan Data');
                document.location.href = '../admin.php?tabel=tabel_Penerbit';
            </script>";
        } else {
            echo "
            <script>
                alert('Gagal menambahkan Data');
                document.location.href = '../admin.php?tabel=tabel_Penerbit';
            </script>";
        }
    }
}
?>