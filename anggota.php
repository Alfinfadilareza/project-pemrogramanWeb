<?php
include 'koneksi.php';

$sql = "SELECT * FROM anggota";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota</title>
</head>

<body>
<a href="dashbord.php"><button>Kembali</button></a>
    <h2>Daftar Anggota</h2>
    <a href="tambah_anggota.php">Tambah Anggota</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['anggota_id'] . "</td>
                        <td>" . $row['nama'] . "</td>
                        <td>" . $row['alamat'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['telepon'] . "</td>
                        <td>
                            <a href='edit_anggota.php?id=" . $row['anggota_id'] . "'>Edit</a>
                            <a href='delete.php?id=" . $row['anggota_id'] . "'>Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>

</html>
