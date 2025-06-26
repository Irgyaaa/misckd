<?php include('config.php'); 

// Query untuk mengambil data dari tabel galeri
$sql = "SELECT id, nama_file, keterangan FROM galeri";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #F8F8FF; /* Ghost White */
        }

        h1 {
            color: #000000; /* Black */
            margin-top: 2rem;
            font-size: 2.5rem; /* Larger title */
        }

        .card {
            border-radius: 15px; /* Rounded corners for cards */
            overflow: hidden; /* Ensures images fit within the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Card shadow */
            transition: transform 0.3s ease-in-out; /* Smooth hover effect */
        }

        .card-img-top {
            height: 250px; /* Increased height for images */
            object-fit: cover; /* Ensures images cover the card */
            transition: transform 0.3s ease; /* Smooth zoom effect */
        }

        .card:hover .card-img-top {
            transform: scale(1.05); /* Slight zoom on hover */
        }

        .card-body {
            background-color: #fff;
            padding: 15px;
        }

        .card-text {
            font-size: 1rem;
            text-align: center;
            color: #333;
        }

        .modal-content {
            border-radius: 15px; /* Rounded corners for modal */
            background-color: #f9f9f9;
        }

        .modal-header {
            background-color: #228B22; /* Forest Green */
            color: white;
        }

        .modal-body {
            padding: 0;
        }

        .modal-body img {
            border-radius: 15px; /* Rounded corners for image */
        }

        .container {
            margin-top: 3rem;
        }

        @media (max-width: 768px) {
            .card-img-top {
                height: 200px;
            }

            h1 {
                font-size: 2rem; /* Adjust title size for mobile */
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<?php include('navbar.php'); ?>

<!-- Isi Galeri -->
<div class="container">
    <h1 class="mt-4 text-center">Galeri Kegiatan Sekolah</h1>
    <div class="row">
        <?php
        $sql = "SELECT nama_file, keterangan FROM galeri";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $i = 0; // Counter for image modal
            while($row = $result->fetch_assoc()) {
                echo '
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal' . $i . '">
                            <img src="uploads/' . $row["nama_file"] . '" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <p class="card-text text-center">' . $row["keterangan"] . '</p>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="imageModal' . $i . '" tabindex="-1" aria-labelledby="imageModalLabel' . $i . '" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel' . $i . '">Keterangan: ' . $row["keterangan"] . '</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="uploads/' . $row["nama_file"] . '" class="img-fluid" alt="...">
                            </div>
                        </div>
                    </div>
                </div>';
                $i++;
            }
        } else {
            echo '<p>Tidak ada foto yang tersedia.</p>';
        }
        ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Footer -->
<?php include('footer.php'); ?>

</body>
</html>
