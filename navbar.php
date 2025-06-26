<nav class="navbar navbar-expand-lg" style="background-color: #228B22;">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="uploads/logoo.png" alt="Logoo" style="height: 40px; margin-right: 10px;">
            <span class="fw-bold text-white">Madrasah Ibtidaiyah Cikadongdong</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'fw-bold' : ''; ?>"
                        href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'profil.php') ? 'fw-bold' : ''; ?>"
                        href="profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'data.php') ? 'fw-bold' : ''; ?>"
                        href="data.php">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'galeri.php') ? 'fw-bold' : ''; ?>"
                        href="galeri.php">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'fw-bold' : ''; ?>"
                        href="contact.php">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
