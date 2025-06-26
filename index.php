<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Madrasah Ibtidaiyah Cikadongdong</title>
    <!-- Bootstrap CSS (hanya versi 5) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Custom CSS styling */
        body {
            background-color: #F8F8FF; /* Ghost White */
            font-family: 'Montserrat', sans-serif;
        }

        .carousel-caption {
            position: absolute;
            top: 45%;
            /* Atur nilai ini untuk memindahkan teks lebih tinggi */
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            color: #ffffff;
            text-align: center;
            width: 90%;
        }

        .carousel-caption h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ffffff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .carousel-caption p {
            font-size: 1.25rem;
            color: #ffffff;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }


        .carousel-item img {
            filter: brightness(0.5);
            /* Darken the image for better readability */
        }

        .img-icon {
            width: 50px;
            /* Atur ukuran sesuai kebutuhan */
            height: auto;
            /* Menjaga rasio aspek gambar */
        }



        /* Style adjustments here */
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include('navbar.php'); ?>

    <!-- Carousel -->
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="uploads/belajar.jpeg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption">
                    <h1>Selamat Datang di Madrasah Ibtidaiyah Cikadongdong</h1>
                    <p>Tempat di mana mimpi besar dimulai dan masa depan cemerlang dibangun.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="uploads/anbk.jpeg" class=" d-block w-100" alt="Slide 3">
                <div class="carousel-caption">
                    <h1>Fasilitas Modern</h1>
                    <p>Menjadikan Sekolah sebagai sumber belajar, sumber informasi serta sumber kreatifitas siswa.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="uploads/guru.jpeg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption">
                    <h1>Guru Berkualitas</h1>
                    <p>Pengajar berdedikasi tinggi untuk mencetak generasi berkualitas.</p>
                </div>
            </div>
        </div>
        <!-- Carousel controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <!-- Home Content -->
    <div class="container my-5">
        <div class="row text-center">
            <div class="col-md-4">
                <img src="uploads/icon-1.png" alt="Fasilitas" class="img-fluid rounded-circle mb-3 img-icon"
                    style="width: 50px;">
                <h3>Fasilitas</h3>
                <p>Fasilitas modern dan lengkap untuk mendukung proses pembelajaran yang optimal.</p>
            </div>
            <div class="col-md-4">
                <img src="uploads/icon-2.png" alt="Tenaga Pengajar" class="img-fluid rounded-circle mb-3 img-icon"
                    style="width: 50px;">
                <h3>Tenaga Pengajar</h3>
                <p>Guru berpengalaman dan berdedikasi tinggi untuk mencetak generasi berkualitas.</p>
            </div>
            <div class="col-md-4">
                <img src="uploads/icon-3.png" alt="Ekstrakurikuler" class="img-fluid rounded-circle mb-3 img-icon"
                    style="width: 50px;">
                <h3>Ekstrakurikuler</h3>
                <p>Beragam kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa.</p>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-12 text-center">
            <h2 class="section-title">Kenapa Harus Memilih Madrasah Ibtidaiyah Cikadongdong?</h2>
            <p class="mx-auto" style="max-width: 800px; line-height: 1.5;">
                Sekolah ini menerapkan pendekatan personal dalam pembelajaran, yang memungkinkan pengajaran disesuaikan
                dengan kebutuhan unik setiap siswa, untuk memaksimalkan potensi mereka.
            </p>
        </div>
    </div>

    <!-- Bootstrap JS (hanya versi 5) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>

</html>