<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $sql = "UPDATE anggota SET nama='$nama', alamat='$alamat', email='$email', telepon='$telepon' WHERE anggota_id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: anggota.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM anggota WHERE anggota_id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>
</head>

<body>
    <h2>Edit Anggota</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['anggota_id']; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        Alamat: <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        Telepon: <input type="text" name="telepon" value="<?php echo $row['telepon']; ?>" required><br>
        <input type="submit" value="Simpan">
    </form>
</body>

</html>
