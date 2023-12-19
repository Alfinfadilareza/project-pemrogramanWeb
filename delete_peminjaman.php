<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $peminjaman_id = $_GET["id"];
    $query = "DELETE FROM peminjaman WHERE peminjaman_id = '$peminjaman_id'"; // Ganti nama_tabel dengan nama tabel Anda
    $conn->query($query);
    header("Location: peminjaman.php");
}
?>
