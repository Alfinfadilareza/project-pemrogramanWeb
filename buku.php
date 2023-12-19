<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
</head>
<body>
<a href="dashbord.php"><button>Kembali</button></a>
    <h2>Daftar Buku</h2>
    
    <?php
    include 'koneksi.php';

    $sql = "SELECT * FROM buku";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Sinopsis</th>
                    <th>Aksi</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['buku_id']}</td>
                    <td>{$row['judul']}</td>
                    <td>{$row['pengarang']}</td>
                    <td>{$row['penerbit']}</td>
                    <td>{$row['tahun_terbit']}</td>
                    <td>{$row['sinopsis']}</td>
                    <td>
                        <a href='edit.php?id={$row['buku_id']}'>Edit</a>
                        <a href='delete.php?id={$row['buku_id']}'>Hapus</a>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Tidak ada data buku.";
    }

    $conn->close();
    ?>

    <br>
    <a href="tambah.php">Tambah Buku</a>
</body>
</html>

