<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahun_terbit = $_POST["tahun_terbit"];
    $sinopsis = $_POST["sinopsis"];

    $sql = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', sinopsis='$sinopsis' WHERE buku_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Buku berhasil diupdate.";
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
    <title>Edit Buku</title>
</head>
<body>
    <h2>Edit Buku</h2>

    <?php
    include 'koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];

        $sql = "SELECT * FROM buku WHERE buku_id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <form action="edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['buku_id']; ?>">

                <label>Judul:</label>
                <input type="text" name="judul" value="<?php echo $row['judul']; ?>" required><br>

                <label>Pengarang:</label>
                <input type="text" name="pengarang" value="<?php echo $row['pengarang']; ?>" required><br>

                <label>Penerbit:</label>
                <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>" required><br>

                <label>Tahun Terbit:</label>
                <input type="text" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>" required><br>

                <label>Sinopsis:</label>
                <textarea name="sinopsis" required><?php echo $row['sinopsis']; ?></textarea><br>

                <input type="submit" value="Simpan">
            </form>
    <?php
        } else {
            echo "Buku tidak ditemukan.";
        }
    }
    ?>

    <br>
    <a href="buku.php">Kembali ke Daftar Buku</a>
</body>
</html>
