<?php
include '../../config.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    $sql = "UPDATE guru SET nama = '$nama', jabatan = '$jabatan' WHERE id_guru = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../data-admin.php"); // Redirect kembali ke halaman data
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
