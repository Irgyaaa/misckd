<?php 
include('config.php'); // Memastikan $pdo sudah terdefinisi

// Mengambil data struktur organisasi dari database
$sql = "SELECT id_guru, nama, jabatan FROM guru";
$result = $conn->query($sql);

$sql = "SELECT id_siswa, kelas, jumlah_putra, jumlah_putri, total FROM siswa";
$result = $conn->query($sql);

// Mengambil total jumlah guru dan siswa
$sql_guru = "SELECT COUNT(*) as total_guru FROM guru";
$result_guru = $conn->query($sql_guru);
$total_guru = $result_guru->fetch_assoc()['total_guru'];

// Menghitung jumlah total siswa (Putra, Putri, Total)
$total_putra = 0;
$total_putri = 0;
$total_siswa = 0;

$sql_siswa = "SELECT jumlah_putra, jumlah_putri, total FROM siswa";
$result_siswa = $conn->query($sql_siswa);

while ($row = $result_siswa->fetch_assoc()) {
    $total_putra += $row['jumlah_putra'];
    $total_putri += $row['jumlah_putri'];
    $total_siswa += $row['total'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sekolah</title>
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
        }

        table {
            margin-top: 1.5rem;
            border-radius: 8px;
            overflow: hidden; /* To round the corners */
        }

        thead {
            background-color: #228B22; /* Forest Green */
            color: #fff; /* White text for contrast */
        }

        tbody tr {
            background-color: #ffffff; /* White background for rows */
        }

        tbody tr:hover {
            background-color: #98FB98; /* Pale Green */
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #98FB98; /* Pale Green */
        }

        th {
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<?php include('navbar.php'); ?>

<!-- Konten -->
<div class="container mt-5">
    <!-- Data Siswa -->
    <h1 class="text-center">Data Siswa</h1>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Kelas</th>
                <th>Jumlah Putra</th>
                <th>Jumlah Putri</th>
                <th>Total Siswa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT kelas, jumlah_putra, jumlah_putri, total FROM siswa";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["kelas"]. "</td><td>" . $row["jumlah_putra"]. "</td><td>" . $row["jumlah_putri"]. "</td><td>" . $row["total"]. "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Data Guru -->
    <h1 class="mt-5 text-center">Data Guru</h1>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT nama, jabatan FROM guru";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["nama"]. "</td><td>" . $row["jabatan"]. "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Tabel Jumlah Siswa dan Guru -->
    <h1 class="mt-5 text-center">Jumlah Siswa dan Guru</h1>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Total Siswa Putra</th>
                <th>Total Siswa Putri</th>
                <th>Total Siswa Keseluruhan</th>
                <th>Total Guru</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $total_putra; ?></td>
                <td><?php echo $total_putri; ?></td>
                <td><?php echo $total_siswa; ?></td>
                <td><?php echo $total_guru; ?></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- footer -->
<?php include('footer.php'); ?>
</body>
</html>
