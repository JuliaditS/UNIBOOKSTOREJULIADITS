<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="../">UNIBOOKSTORE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo $index; ?>" aria-current="page" href="index.php">Halaman Utama</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo $admin; ?>" href="#" id="dropdownData" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pengolahan Data
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownData">
                        <li><a class="dropdown-item" href="admin.php?tabel=tabel_Buku">Data Buku</a></li>
                        <li><a class="dropdown-item" href="admin.php?tabel=tabel_Penerbit">Data Penerbit</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $pengadaan; ?>" href="pengadaan.php">Kebutuhan Buku</a>
                </li>
            </ul>
        </div>
    </div>
</nav>