<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buku_id = $_POST["buku_id"];
    $anggota_id = $_POST["anggota_id"];
    $tanggal_peminjaman = $_POST["tanggal_peminjaman"];
    $tanggal_kembali = $_POST["tanggal_kembali"];
    $status = $_POST["status"];

    $sql = "INSERT INTO peminjaman (buku_id, anggota_id, tanggal_peminjaman, tanggal_kembali, status)
            VALUES ('$buku_id', '$anggota_id', '$tanggal_peminjaman', '$tanggal_kembali', '$status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: peminjaman.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Peminjaman</title>
</head>
<body>
    <h2>Tambah Data Peminjaman</h2>
    <form method="post" action="">
        Buku ID: <input type="text" name="buku_id"><br>
        Anggota ID: <input type="text" name="anggota_id"><br>
        Tanggal Peminjaman: <input type="date" name="tanggal_peminjaman"><br>
        Tanggal Kembali: <input type="date" name="tanggal_kembali"><br>
        Status: 
        <select name="status">
            <option value="dipinjam">Dipinjam</option>
            <option value="kembali">Kembali</option>
        </select><br>
        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="peminjaman.php">Kembali ke Data Peminjaman</a>
</body>
</html>
