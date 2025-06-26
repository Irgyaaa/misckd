<?php
// Menghubungkan ke file konfigurasi database
include '../config.php';

// Proses upload foto galeri baru
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keterangan = htmlspecialchars($_POST['keterangan']);
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file gambar atau bukan
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        header("Location: galeri-admin.php?status=error&action=upload_not_image");
        exit;
    }

    // Periksa ukuran file (contoh: 2MB maksimal)
    if ($_FILES["fileToUpload"]["size"] > 2000000) {
        header("Location: galeri-admin.php?status=error&action=file_too_large");
        exit;
    }

    // Hanya izinkan format gambar tertentu
    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        header("Location: galeri-admin.php?status=error&action=invalid_file_type");
        exit;
    }

    if ($uploadOk == 1) {
        if (!is_dir($target_dir)) {
            header("Location: galeri-admin.php?status=error&action=directory_not_found");
            exit;
        } elseif (!is_writable($target_dir)) {
            header("Location: galeri-admin.php?status=error&action=directory_not_writable");
            exit;
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $nama_file = basename($_FILES["fileToUpload"]["name"]);
                $stmt = $conn->prepare("INSERT INTO galeri (nama_file, keterangan) VALUES (?, ?)");
                $stmt->bind_param("ss", $nama_file, $keterangan);

                if ($stmt->execute()) {
                    header("Location: galeri-admin.php?status=success&action=upload");
                } else {
                    header("Location: galeri-admin.php?status=error&action=database_error");
                }
                $stmt->close();
            } else {
                header("Location: galeri-admin.php?status=error&action=upload_failed");
            }
        }
    }
    exit;
}

// Query untuk mengambil data dari tabel galeri
$sql = "SELECT id, nama_file, keterangan FROM galeri";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Admin</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background-color: #006400;
            color: #ffffff;
            min-height: 100vh;
            padding: 20px 0;
        }

        .sidebar h2 {
            text-align: center;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
        }

        .sidebar ul li a {
            color: #b0b7c3;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li:hover {
            background-color: #2F4F4F;
        }

        /* Logout Button */
        .logout-btn {
            padding: 8px 12px;
            background-color: #007bff;
            /* Blue color */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            /* Remove underline */
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .logout-btn:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .header h1 {
            font-size: 24px;
            color: #333;
        }

        .header .user-profile {
            font-size: 18px;
            color: #333;
            display: flex;
            align-items: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="file"],
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        textarea::placeholder {
            color: #999;
        }


        /* Data Table */
        .data-table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .data-table th {
            background-color: #f5f5f5;
            color: #333;
        }

        .data-table tr:hover {
            background-color: #f9f9f9;
        }

        /* Buttons */
        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-submit {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }
    </style>
    <script>
        // JavaScript untuk menampilkan pop-up pesan berhasil/gagal
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');
            const action = urlParams.get('action');

            let message;
            if (status === 'success' && action === 'upload') {
                message = "Foto berhasil ditambahkan!";
            } else if (status === 'error') {
                if (action === 'upload_not_image') {
                    message = "File bukan gambar.";
                } else if (action === 'file_too_large') {
                    message = "Maaf, file terlalu besar.";
                } else if (action === 'invalid_file_type') {
                    message = "Hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
                } else if (action === 'directory_not_found') {
                    message = "Direktori tidak ditemukan.";
                } else if (action === 'directory_not_writable') {
                    message = "Direktori uploads tidak dapat ditulisi.";
                } else if (action === 'database_error') {
                    message = "Gagal menyimpan ke database.";
                } else if (action === 'upload_failed') {
                    message = "Maaf, terjadi kesalahan saat mengunggah file.";
                }
            }
            if (message) {
                alert(message);
            }
        });
    </script>
</head>

<body>

    <div class="sidebar">
        <h2>Data Admin</h2>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data-admin.php">Data Admin</a></li>
            <li><a href="siswa-admin.php">Siswa Admin</a></li>
            <li><a href="galeri-admin.php">Data Galeri Admin</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
            <div class="user-profile">
                <span style="margin-right: 10px;">Hello, Admin Madrasah Ibtidaiyah Cikadongdong!</span>
                <!-- Change this text -->
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </div>

        <div class="main-content">
            <div class="header">
                <h1>Galeri Admin</h1>
                <div class="user-profile">Administrator</div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="fileToUpload">Pilih Foto:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <textarea name="keterangan" id="keterangan" rows="4" placeholder="Masukkan keterangan foto..."
                        required></textarea>
                </div>
                <button type="submit" class="btn-submit">Unggah Foto</button>
            </form>


            <h2>Daftar Galeri</h2>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><img src="../uploads/<?= htmlspecialchars($row['nama_file']) ?>" alt="Foto Galeri"
                                        width="100"></td>
                                <td><?= htmlspecialchars($row['keterangan']) ?></td>
                                <td>
                                    <a href="galeri/edit-galeri.php?id=<?= $row['id'] ?>">Edit</a> |
                                    <a href="galeri/hapus-galeri.php?id=<?= $row['id'] ?>"
                                        onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Tidak ada data galeri.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

</body>

</html>

<?php
// Menutup koneksi database
$conn->close();
?>