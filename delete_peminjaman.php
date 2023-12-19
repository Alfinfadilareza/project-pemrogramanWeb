<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $peminjaman_id = $_GET["id"];

    $sql = "DELETE FROM peminjaman WHERE peminjaman_id = $peminjaman_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: peminjaman.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
