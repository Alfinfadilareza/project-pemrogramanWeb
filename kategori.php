<?php
include "koneksi.php";

// Tampilkan data dari tabel kategori
$sql = "SELECT * FROM kategori";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
</head>
<body>

<h2>Daftar Kategori</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Kategori</th>
        <th>Aksi</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["kategori_id"]."</td>";
            echo "<td>".$row["nama_kategori"]."</td>";
            echo "<td><a href='edit_kategori.php?id=".$row["kategori_id"]."'>Edit</a> | <a href='delete_kategori.php?id=".$row["kategori_id"]."'>Hapus</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
    }
    ?>

</table>

<a href="tambah_kategori.php">Tambah Kategori</a>

</body>
</html>
