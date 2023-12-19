<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kategori = $_POST["nama_kategori"];

    $sql = "INSERT INTO nama_tabel_kategori (nama_kategori) VALUES ('$nama_kategori')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
</head>
<body>

<h2>Tambah Kategori</h2>

<form action="tambah.php" method="POST">
    <label for="nama_kategori">Nama Kategori:</label>
    <input type="text" id="nama_kategori" name="nama_kategori" required>
    <br>
    <input type="submit" value="Tambah">
</form>

<a href="index.php">Kembali</a>

</body>
</html>
