<?php
include '../../config.php';

$id = $_GET['id'];

$sql = "DELETE FROM guru WHERE id_guru='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: ../data-admin.php");
?>
