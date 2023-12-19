<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buku_id = $_POST["buku_id"];
    $anggota_id = $_POST["anggota_id"];
    $tanggal_peminjaman = $_POST["tanggal_peminjaman"];

    $query = "INSERT INTO peminjaman (buku_id, anggota_id, tanggal_peminjaman) VALUES ('$buku_id', '$anggota_id', '$tanggal_peminjaman')"; // Ganti nama_tabel dengan nama tabel Anda
    $conn->query($query);
    header("Location: peminjaman.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peminjaman</title>
</head>
<body>
    <h2>Tambah Peminjaman</h2>
    <form method="post" action="">
        <label>Buku ID:</label>
        <select name="buku_id" required>
            <?php
            // Fetch existing buku_id values from the database and populate the dropdown
            $result = $conn->query("SELECT buku_id FROM buku");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='".$row['buku_id']."'>".$row['buku_id']."</option>";
            }
            ?>
        </select><br>

        <label>Anggota ID:</label>
        <select name="anggota_id" required>
            <?php
            // Fetch existing anggota_id values from the database and populate the dropdown
            $result = $conn->query("SELECT anggota_id FROM anggota");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='".$row['anggota_id']."'>".$row['anggota_id']."</option>";
            }
            ?>
        </select><br>

        <label>Tanggal Peminjaman:</label>
        <input type="date" name="tanggal_peminjaman" required><br>

        <input type="submit" value="Tambah">
    </form>
    <a href="peminjaman.php">Kembali ke Daftar Peminjaman</a>
</body>
</html>
