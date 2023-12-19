<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $peminjaman_id = $_GET["id"];
    $sql = "SELECT * FROM peminjaman WHERE peminjaman_id = $peminjaman_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $buku_id = $row["buku_id"];
        $anggota_id = $row["anggota_id"];
        $tanggal_peminjaman = $row["tanggal_peminjaman"];
        $tanggal_kembali = $row["tanggal_kembali"];
        $status = $row["status"];
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peminjaman_id = $_POST["peminjaman_id"];
    $buku_id = $_POST["buku_id"];
    $anggota_id = $_POST["anggota_id"];
    $tanggal_peminjaman = $_POST["tanggal_peminjaman"];
    $tanggal_kembali = $_POST["tanggal_kembali"];
    $status = $_POST["status"];

    $sql = "UPDATE peminjaman
            SET buku_id = '$buku_id',
                anggota_id = '$anggota_id',
                tanggal_peminjaman = '$tanggal_peminjaman',
                tanggal_kembali = '$tanggal_kembali',
                status = '$status'
            WHERE peminjaman_id = $peminjaman_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: peminjaman.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peminjaman</title>
</head>
<body>
    <h2>Edit Data Peminjaman</h2>
    <form method="post" action="">
        <input type="hidden" name="peminjaman_id" value="<?php echo $peminjaman_id; ?>">
        Buku ID: <input type="text" name="buku_id" value="<?php echo $buku_id; ?>"><br>
        Anggota ID: <input type="text" name="anggota_id" value="<?php echo $anggota_id; ?>"><br>
        Tanggal Peminjaman: <input type="date" name="tanggal_peminjaman" value="<?php echo $tanggal_peminjaman; ?>"><br>
        Tanggal Kembali: <input type="date" name="tanggal_kembali" value="<?php echo $tanggal_kembali; ?>"><br>
        Status: 
        <select name="status">
            <option value="dipinjam" <?php echo ($status == 'dipinjam') ? 'selected' : ''; ?>>Dipinjam</option>
            <option value="kembali" <?php echo ($status == 'kembali') ? 'selected' : ''; ?>>Kembali</option>
        </select><br>
        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="peminjaman.php">Kembali ke Data Peminjaman</a>
</body>
</html>
