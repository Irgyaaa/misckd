<?php
include '../../config.php';

$id = $_GET['id'];

$sql = "DELETE FROM galeri WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: ../galeri-admin.php");
?>
