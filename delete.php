<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $buku_id = $_GET["id"];

    $sql = "DELETE FROM buku WHERE buku_id = $buku_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: buku.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>