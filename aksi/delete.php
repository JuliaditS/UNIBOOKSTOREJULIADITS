<?php
    include '../include/config.php';
    $hapus = "";

    $db = dbConnect();
    if($_GET['tabel']==="true"){
        $kode = $db->escape_string(openssl_decrypt(base64_decode($_GET["ID_Buku"]), "AES-128-CTR", "GeeksforGeeks", $options = 0, "1234567891011121"));
        $hapus = mysqli_query($db,"DELETE FROM tabel_Buku WHERE ID_Buku='$kode'");

        if($hapus){
            echo "
            <script>
                alert('Data berhasil di hapus');
                document.location.href = '../admin.php?tabel=tabel_Buku';
            </script>";
            
        } else {
           echo "
            <script>
                alert('Data gagal di hapus');
                document.location.href = '../admin.php?tabel=tabel_Buku';
            </script>";
           
        }
    } else {
        $kode = $db->escape_string(openssl_decrypt(base64_decode($_GET["ID_Penerbit"]), "AES-128-CTR", "GeeksforGeeks", $options = 0, "1234567891011121"));
        $hapus = mysqli_query($db,"DELETE FROM tabel_Penerbit WHERE ID_Penerbit='$kode'");

        if($hapus){
            echo "
            <script>
                alert('Data berhasil di hapus');
                document.location.href = '../admin.php?tabel=tabel_Penerbit';
            </script>";
            
        } else {
           echo "
            <script>
                alert('Data gagal di hapus');
                document.location.href = '../admin.php?tabel=tabel_Penerbit';
            </script>";
           
        }
    }

    
    
?>