<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM anggota WHERE anggota_id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: anggota.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
