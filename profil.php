<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madrasah Ibtidaiyah Cikadongdong - Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #F8F8FF; /* Ghost White */
        }

        .navbar {
            border: none;
            background-color: #E3F2FD;
        }

        .header {
            text-align: center;
            margin: 50px 0;
            color: #333;
        }

        h1,
        h2,
        h3 {
            color: #333;
        }

        hr {
            border: 1px solid #000000;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        /* Warna untuk tab sebelum dipilih */
        .nav-link {
            color: #228B22; /* Forest Green atau warna pale green */
        }

        /* Warna untuk tab yang dipilih (aktif) */
        .nav-link.active {
            color: #98FB98; /* Pale Green */
            background-color: #E3F2FD; /* Background biru muda untuk tab aktif */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include('navbar.php'); ?>

    <!-- Konten Profil Sekolah -->
    <div class="container mt-5 flex-fill">
        <!-- Nav Tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="visi-tab" data-bs-toggle="tab" href="#visi" role="tab"
                    aria-controls="visi" aria-selected="true">Visi & Misi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Strategi-tab" data-bs-toggle="tab" href="#Strategi" role="tab"
                    aria-controls="Strategi" aria-selected="false">Strategi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tentang-tab" data-bs-toggle="tab" href="#tentang" role="tab"
                    aria-controls="tentang" aria-selected="false">Tentang Sekolah</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-3">
            <!-- Visi & Misi -->
            <div class="tab-pane fade show active" id="visi" role="tabpanel" aria-labelledby="visi-tab">
                <h1>Visi & Misi</h1>
                <hr>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <h3>Visi</h3>
                        <hr width="200px" style="margin-left:auto; margin-right:auto;">
                        <p class="text-justify">
                            "Mencetak Generasi Islami, Implementasi Digital Berwawasan Global."
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-center">Misi</h3>
                        <hr width="200px" style="margin-left:auto; margin-right:auto;">
                        <ul class="text-justify">
                            <li>1. Menciptakan warga sekolah yang memiliki jiwa pemimpin berlandaskan Qur’an dan Sunnah.</li>
                            <li>2. Mempasilitasi lingkungan belajar yang berbasis digital.</li>
                            <li>3. Menciptakan warga sekolah berpikir kreatif,inovatif dan kritis.</li>
                            <li>4. Menciptakan warga sekolah yang berkarakter, peduli lingkungan serta bertanggungjawab.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Strategi -->
            <div class="tab-pane fade" id="Strategi" role="tabpanel" aria-labelledby="Strategi-tab">
                <h2>Strategi</h2>
                <hr>
                <ul class="text-justify">
                    <li>1. Menanamkan keimanan dan ketaqwaan bagi semua warga sekolah.</li>
                    <li>2. Mengefektifkan proses belajar mengajar</li>
                    <li>3. Membina sikap taat dan patuh terhadap aturan.</li>
                    <li>4. Peningkatan etos kerja dan keidsiplinan siswa dan guru.</li>
                </ul>
            </div>

            <!-- Tentang Sekolah -->
            <div class="tab-pane fade" id="tentang" role="tabpanel" aria-labelledby="tentang-tab">
                <h2>Tentang Sekolah</h2>
                <hr>
                <ul class="text-justify">
                    <li>- Nama Sekolah: Madrasah Ibtidaiyah Cikadongdong</li>
                    <li>- Alamat: Dusun Cikadongdong RT. 014/RW. 002 Kec. Purwadadi, Kabupaten Ciamis, Jawa Barat 46286</li>
                    <li>- Nomor Statistik Sekolah: 111232070126</li>
                    <li>- NPSN: 20212051/60708460</li>
                    <li>- Tahun Berdiri: 1963</li>
                    <li>- Status Sekolah: Swasta</li>
                    <li>- Akreditasi Madrasah: B</li>
                    <li>- Luas Tanah: 689 m²</li>
                    <li>- Luas Bangunan: 557,75 m²</li>
                    <li>- Jumlah Guru/Karyawan: 8</li>
                    <li>- Nama Kepala Madrasah: Miftahudin, S.Pd.I</li>
                    <li>- Nama Komite Madrasah: Kh.Ijudin Baehaki, S.pd.I</li>
                    <li>- Nama Bendahara: Cucu Darcu S.Pd.I</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>
