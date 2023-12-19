<?php
include 'koneksi.php';

$query = "SELECT peminjaman.peminjaman_id, peminjaman.buku_id, peminjaman.anggota_id, peminjaman.tanggal_peminjaman, buku.judul AS judul_buku, anggota.nama AS nama_anggota
          FROM peminjaman
          JOIN buku ON peminjaman.buku_id = buku.buku_id
          JOIN anggota ON peminjaman.anggota_id = anggota.anggota_id";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan</title>
</head>
<body>
<a href="dashbord.php"><button>Kembali</button></a>
    <h2>Daftar Peminjaman</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Buku ID</th>
            <th>Anggota ID</th>
            <th>Judul Buku</th>
            <th>Nama Anggota</th>
            <th>Tanggal Peminjaman</th>
            <th>Action</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['peminjaman_id']."</td>";
            echo "<td>".$row['buku_id']."</td>";
            echo "<td>".$row['anggota_id']."</td>";
            echo "<td>".$row['judul_buku']."</td>";
            echo "<td>".$row['nama_anggota']."</td>";
            echo "<td>".$row['tanggal_peminjaman']."</td>";
            echo "<td><a href='edit_peminjaman.php?id=".$row['peminjaman_id']."'>Edit</a> | <a href='delete_peminjaman.php?id=".$row['peminjaman_id']."'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a href="tambah_peminjaman.php">Tambah Peminjaman</a>
</body>
</html>
