

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Dashboard</title>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #333;
        background: url('https://png.pngtree.com/thumb_back/fh260/background/20210908/pngtree-library-at-noon-image_829740.jpg') center center fixed; /* Replace 'path/to/your/image.jpg' with the actual path to your image */
        background-size: cover;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    .container {
        width: 80%;
        margin: 50px auto;
        background-color: #fff;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        transition: box-shadow 0.4s, transform 0.4s;
    }

    .container:hover {
        box-shadow: 0 0 40px rgba(0, 0, 0, 0.4);
        transform: scale(1.03);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 40px;
        background-color: #f5f5f5;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        font-weight: bold;
        border-radius: 15px;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 20px;
        text-align: left;
    }

    th {
        background: linear-gradient(to right, #3498db, #2980b9);
        color: #fff;
        border-radius: 15px 15px 0 0;
    }

    td {
        background-color: #fff;
    }

    a {
        text-decoration: none;
        padding: 15px 30px;
        margin: 20px;
        border: 3px solid #3498db;
        border-radius: 10px;
        background: linear-gradient(to right, #3498db, #2980b9);
        color: #fff;
        transition: background 0.4s, color 0.4s, transform 0.4s;
        display: inline-block;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: bold;
    }

    a:hover {
        background: linear-gradient(to right, #2980b9, #256a8a);
        color: #fff;
        transform: translateY(-5px);
    }
</style>


</head>

<body>

    <div class="container">
        <h2>Data Perpustakaan</h2>

       

        <br>
        <a href="buku.php">BUKU</a>
        <a href="anggota.php">Data Anggota</a> <!-- Add this link -->
        <a href="peminjaman.php">Data Peminjaman</a> <!-- Add this link -->
        

    </div>
    <a href="logout.php">Logout</a>
</body>

</html>

<?php

?>
