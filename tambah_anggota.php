<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $sql = "INSERT INTO anggota (nama, alamat, email, telepon) VALUES ('$nama', '$alamat', '$email', '$telepon')";

    if ($conn->query($sql) === TRUE) {
        header("Location: anggota.php");
        exit();
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
    <title>Tambah Anggota</title>
</head>

<body>
    <h2>Tambah Anggota</h2>
    <form action="" method="post">
        Nama: <input type="text" name="nama" required><br>
        Alamat: <input type="text" name="alamat" required><br>
        Email: <input type="email" name="email" required><br>
        Telepon: <input type="text" name="telepon" required><br>
        <input type="submit" value="Tambah">
    </form>
</body>

</html>
