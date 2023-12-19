<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $pengembalian_id = $_GET["id"];

    $sql = "DELETE FROM pengembalian WHERE pengembalian_id = $pengembalian_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: pengembalian.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
