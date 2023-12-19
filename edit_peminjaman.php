<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $peminjaman_id = $_GET["id"];
    $query = "SELECT * FROM peminjaman WHERE peminjaman_id = '$peminjaman_id'"; // Ganti nama_tabel dengan nama tabel Anda
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peminjaman_id = $_POST["peminjaman_id"];
    $buku_id = $_POST["buku_id"];
    $anggota_id = $_POST["anggota_id"];
    $tanggal_peminjaman = $_POST["tanggal_peminjaman"];

    $query = "UPDATE peminjaman SET buku_id='$buku_id', anggota_id='$anggota_id', tanggal_peminjaman='$tanggal_peminjaman' WHERE peminjaman_id='$peminjaman_id'"; // Ganti nama_tabel dengan nama tabel Anda
    $conn->query($query);
    header("Location: peminjaman.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Peminjaman</title>
</head>
<body>
    <h2>Edit Peminjaman</h2>
    <form method="post" action="">
        <input type="hidden" name="peminjaman_id" value="<?php echo $row['peminjaman_id']; ?>">

        <label>Buku ID:</label>
        <input type="text" name="buku_id" value="<?php echo $row['buku_id']; ?>" required><br>

        <label>Anggota ID:</label>
        <input type="text" name="anggota_id" value="<?php echo $row['anggota_id']; ?>" required><br>

        <label>Tanggal Peminjaman:</label>
        <input type="date" name="tanggal_peminjaman" value="<?php echo $row['tanggal_peminjaman']; ?>" required><br>

        <input type="submit" value="Update">
    </form>
    <a href="peminjaman.php">Kembali ke Daftar Peminjaman</a>
</body>
</html>
