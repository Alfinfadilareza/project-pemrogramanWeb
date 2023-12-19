<?php
include 'koneksi.php';

// Joining buku, anggota, peminjaman, and pengembalian tables
$sql = "SELECT buku.buku_id, buku.judul, buku.pengarang, buku.penerbit, buku.tahun_terbit, buku.sinopsis,
        anggota.anggota_id, anggota.nama, anggota.alamat, anggota.email, anggota.telepon,
        peminjaman.peminjaman_id, peminjaman.tanggal_peminjaman, peminjaman.tanggal_kembali, peminjaman.status AS peminjaman_status,
        pengembalian.pengembalian_id, pengembalian.tanggal_pengembalian, pengembalian.denda, pengembalian.status_pengembalian
        FROM buku
        LEFT JOIN peminjaman ON buku.buku_id = peminjaman.buku_id
        LEFT JOIN anggota ON peminjaman.anggota_id = anggota.anggota_id
        LEFT JOIN pengembalian ON peminjaman.peminjaman_id = pengembalian.peminjaman_id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELURUH DATA PERPUSTAKAAN</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
<body>
    <h2>SELURUH DATA PERPUSTAKAAN</h2>
    <table border="1">
        <tr>
            <th>Buku ID</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Sinopsis</th>
            <th>Anggota ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Peminjaman ID</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Kembali</th>
            <th>Status Peminjaman</th>
            <th>Pengembalian ID</th>
            <th>Tanggal Pengembalian</th>
            <th>Denda</th>
            <th>Status Pengembalian</th>
            <a href="dashbord.php"><button>Kembali</button></a>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["buku_id"] . "</td>";
                echo "<td>" . $row["judul"] . "</td>";
                echo "<td>" . $row["pengarang"] . "</td>";
                echo "<td>" . $row["penerbit"] . "</td>";
                echo "<td>" . $row["tahun_terbit"] . "</td>";
                echo "<td>" . $row["sinopsis"] . "</td>";
                echo "<td>" . $row["anggota_id"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["alamat"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telepon"] . "</td>";
                echo "<td>" . $row["peminjaman_id"] . "</td>";
                echo "<td>" . $row["tanggal_peminjaman"] . "</td>";
                echo "<td>" . $row["tanggal_kembali"] . "</td>";
                echo "<td>" . $row["peminjaman_status"] . "</td>";
                echo "<td>" . $row["pengembalian_id"] . "</td>";
                echo "<td>" . $row["tanggal_pengembalian"] . "</td>";
                echo "<td>" . $row["denda"] . "</td>";
                echo "<td>" . $row["status_pengembalian"] . "</td>";
               
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='21'>Tidak ada data.</td></tr>";
        }
        ?>
    </table>
</body>

</html>
<?php
$conn->close();
?>
