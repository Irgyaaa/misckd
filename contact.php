<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #F8F8FF; /* Ghost White */
        }

        h2 {
            color: #000000; /* Black */
        }

        .social-links a {
            margin-right: 10px; /* Space between social buttons */
        }

        .img-contact {
            max-width: 100%; /* Responsive image */
            height: auto;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<?php include('navbar.php'); ?>

<!-- isi -->
<!-- Kontak Content -->
<div class="container my-5">
    <h2 class="text-center mb-4">Kontak Kami</h2>
    <div class="row my-5 align-items-center">
        <!-- Kolom Kiri: Foto -->
        <div class="col-lg-6 d-flex justify-content-center mb-4 mb-lg-0">
            <img src="uploads/logoo.png" alt="Foto Kontak" class="img-fluid rounded border img-contact">
        </div>
        <!-- Kolom Kanan: Teks dan Link -->
        <div class="col-lg-6 contact-info">
            <h5>Informasi Kontak</h5>
            <p>Untuk pertanyaan, saran, atau informasi lebih lanjut tentang Madrasah Ibtidaiyah Cikadongdong, Anda dapat menghubungi kami melalui salah satu cara berikut:</p>
            <p><strong>Facebook:</strong> Temukan kami di <a href="https://www.facebook.com/share/1MYtd3UPcC/?mibextid=wwXIfr" class="link-primary" target="_blank">Madrasah Ibtidaiyah Cikadongdong</a> untuk update terkini dan berita.</p>
            <p><strong>Alamat:</strong> Kami berada di Dusun Cikadongdong, Desa Sukamulya, Kec. Purwadadi, Kabupaten Ciamis, Jawa Barat 46385. Anda dapat mengunjungi kami di lokasi ini untuk keperluan administratif atau kunjungan sekolah.</p>
            <p><strong>Email:</strong> Kirimkan pertanyaan atau permintaan Anda ke <a href="mailto:miscikadongdong@yahoo.com" class="link-primary">miscikadongdong@yahoo.com</a>. Kami akan membalas email Anda dalam waktu 1-2 hari kerja.</p>
            <div class="social-links">
                <a href="https://www.facebook.com/share/1MYtd3UPcC/?mibextid=wwXIfr" class="btn btn-primary" target="_blank">
                    <i class="bi bi-facebook me-2"></i> Ikuti Kami di Facebook
                </a>
                <a href="https://maps.app.goo.gl/CH6NkS9sdZE5AoTUA?g_st=com.google.maps.preview.copy" class="btn btn-danger" target="_blank">
                    <i class="bi bi-geo-alt me-2"></i> Lokasi di Google Maps
                </a>
                <a href="mailto:miscikadonngdong@yahoo.com" class="btn btn-secondary" aria-label="Email">
                    <i class="bi bi-envelope me-2"></i> Kirim Email
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- footer -->
<?php include('footer.php'); ?>
</body>
</html>