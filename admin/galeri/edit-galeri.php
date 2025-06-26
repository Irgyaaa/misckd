<?php
// Menampilkan error untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Menghubungkan ke file konfigurasi database
include '../../config.php';

// Validasi apakah ada parameter id yang diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data galeri berdasarkan id
    $sql = "SELECT * FROM galeri WHERE id = $id"; 
    $result = $conn->query($sql);

    // Cek apakah data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak valid.";
    exit;
}

// Proses update data galeri
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keterangan = $_POST['keterangan'];
    $target_dir = __DIR__ . "/../../uploads/"; // Path absolut ke folder uploads
    $uploadOk = 1;
    $file_uploaded = false;

    // Jika ada file yang diunggah
    if (!empty($_FILES["fileToUpload"]["name"])) {
        // Pastikan folder tujuan ada
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true); // Buat folder jika belum ada
        }

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah file gambar
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check === false) {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Batasi ukuran file (contoh: 2MB maksimal)
        if ($_FILES["fileToUpload"]["size"] > 2000000) {
            echo "Maaf, file terlalu besar.";
            $uploadOk = 0;
        }

        // Hanya izinkan format gambar tertentu
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
            $uploadOk = 0;
        }

        // Jika file lolos pengecekan
        if ($uploadOk == 1) {
            $file_uploaded = true; // Tandai bahwa file baru telah diunggah
            $nama_file = basename($_FILES["fileToUpload"]["name"]);

            // Pindahkan file baru ke folder tujuan
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // Hapus file lama hanya setelah file baru berhasil diunggah
                if (!empty($row['nama_file']) && file_exists($target_dir . $row['nama_file'])) {
                    unlink($target_dir . $row['nama_file']);
                }
                // Update data dengan file baru
                $sql_update = "UPDATE galeri SET nama_file = '$nama_file', keterangan = '$keterangan' WHERE id = $id";
            } else {
                echo "Maaf, terjadi kesalahan saat mengunggah file.";
                exit;
            }
        }
    } else {
        // Update data tanpa mengubah file
        $sql_update = "UPDATE galeri SET keterangan = '$keterangan' WHERE id = $id";
    }

    // Jalankan query update dan redirect jika berhasil
    if ($conn->query($sql_update) === TRUE) {
        header("Location: ../galeri-admin.php"); // Redirect setelah berhasil
        exit;
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Galeri</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Galeri</h2>
        <div class="card shadow p-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= htmlspecialchars($row['keterangan']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="fileToUpload">Unggah File (Opsional):</label>
                    <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
                </div>
                <div class="form-group">
                    <?php if (!empty($row['nama_file'])): ?>
                        <p>File Saat Ini: <strong><?= htmlspecialchars($row['nama_file']) ?></strong></p>
                        <img src="../../uploads/<?= htmlspecialchars($row['nama_file']) ?>" alt="Preview" class="img-thumbnail" style="max-width: 200px;">
                    <?php else: ?>
                        <p class="text-muted">Tidak ada file.</p>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="../galeri-admin.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
