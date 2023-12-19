<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahun_terbit = $_POST["tahun_terbit"];
    $sinopsis = $_POST["sinopsis"];

    $sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, sinopsis) VALUES ('$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$sinopsis')";

    if ($conn->query($sql) === TRUE) {
        echo "Buku berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>
<body>
    <h2>Tambah Buku</h2>

    <form action="tambah.php" method="post">
        <label>Judul:</label>
        <input type="text" name="judul" required><br>

        <label>Pengarang:</label>
        <input type="text" name="pengarang" required><br>

        <label>Penerbit:</label>
        <input type="text" name="penerbit" required><br>

        <label>Tahun Terbit:</label>
        <input type="text" name="tahun_terbit" required><br>

        <label>Sinopsis:</label>
        <textarea name="sinopsis" required></textarea><br>

        <input type="submit" value="Tambah">
    </form>

    <br>
    <a href="buku.php">Kembali ke Daftar Buku</a>
</body>
</html>
