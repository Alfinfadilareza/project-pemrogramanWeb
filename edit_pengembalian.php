<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $pengembalian_id = $_GET["id"];

    $sql = "SELECT * FROM pengembalian WHERE pengembalian_id = $pengembalian_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $peminjaman_id = $row["peminjaman_id"];
        $tanggal_pengembalian = $row["tanggal_pengembalian"];
        $denda = $row["denda"];
        $status_pengembalian = $row["status_pengembalian"];
    } else {
        echo "Data not found.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pengembalian_id = $_POST["pengembalian_id"];
    $peminjaman_id = $_POST["peminjaman_id"];
    $tanggal_pengembalian = $_POST["tanggal_pengembalian"];
    $denda = $_POST["denda"];
    $status_pengembalian = $_POST["status_pengembalian"];

    $sql = "UPDATE pengembalian SET 
            peminjaman_id='$peminjaman_id', 
            tanggal_pengembalian='$tanggal_pengembalian', 
            denda='$denda', 
            status_pengembalian='$status_pengembalian' 
            WHERE pengembalian_id='$pengembalian_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: pengembalian.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengembalian</title>
</head>
<body>

<h2>Edit Data Pengembalian</h2>

<form action="" method="POST">
    <input type="hidden" name="pengembalian_id" value="<?php echo $pengembalian_id; ?>">

    <label for="peminjaman_id">Peminjaman ID:</label>
    <input type="text" name="peminjaman_id" value="<?php echo $peminjaman_id; ?>" required><br>

    <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
    <input type="date" name="tanggal_pengembalian" value="<?php echo $tanggal_pengembalian; ?>" required><br>

    <label for="denda">Denda:</label>
    <input type="text" name="denda" value="<?php echo $denda; ?>" required><br>

    <label for="status_pengembalian">Status Pengembalian:</label>
    <select name="status_pengembalian">
        <option value="dikembalikan" <?php echo ($status_pengembalian == 'dikembalikan') ? 'selected' : ''; ?>>Dikembalikan</option>
        <option value="terlambat" <?php echo ($status_pengembalian == 'terlambat') ? 'selected' : ''; ?>>Terlambat</option>
    </select><br>

    <input type="submit" value="Simpan">
</form>

<br>
<a href="pengembalian.php">Kembali ke Data Pengembalian</a>

</body>
</html>
