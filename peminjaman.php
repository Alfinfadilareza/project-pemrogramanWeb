<?php
include "koneksi.php";

// Ambil data peminjaman dari database
$sql = "SELECT * FROM peminjaman";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
</head>
<body>
<a href="dashbord.php"><button>Kembali</button></a>
    <h2>Data Peminjaman</h2>
    <table border="1">
        <tr>
            <th>Peminjaman ID</th>
            <th>Buku ID</th>
            <th>Anggota ID</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["peminjaman_id"] . "</td>";
                echo "<td>" . $row["buku_id"] . "</td>";
                echo "<td>" . $row["anggota_id"] . "</td>";
                echo "<td>" . $row["tanggal_peminjaman"] . "</td>";
                echo "<td>" . $row["tanggal_kembali"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td><a href='edit_peminjaman.php?id=" . $row["peminjaman_id"] . "'>Edit</a> | <a href='delete_peminjaman.php?id=" . $row["peminjaman_id"] . "'>Hapus</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data peminjaman.</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="tambah_peminjaman.php">Tambah Data Peminjaman</a>
</body>
</html>
