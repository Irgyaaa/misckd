<?php
include '../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    
    $sql = "INSERT INTO guru (nama, jabatan) VALUES ('$nama', '$jabatan')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: ../data-admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Guru</title>
</head>
<body>
    <h2>Tambah Data Guru</h2>
    <form method="post" action="">
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <br>
        <label>Jabatan:</label>
        <input type="text" name="jabatan" required>
        <br>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
