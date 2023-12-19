<!DOCTYPE html>
<html lang="en">

<?php
include "koneksi.php";
session_start();

if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $query_cek = $mysqli->query("SELECT *  FROM users where username= '$user' AND  password= '$pass'");
    if($query_cek->num_rows > 0)
    {
        $row = mysqli_fetch_assoc($query_cek);
        $_SESSION['username'] = $row['username'];
        echo $_SESSION['username'];
    } else {
        echo "salah";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    background: url('https://png.pngtree.com/thumb_back/fh260/background/20210908/pngtree-library-at-noon-image_829740.jpg') center center fixed;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.login-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px; /* Atur lebar container sesuai kebutuhan */
}

.login-container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.login-container label {
    display: block;
    margin-bottom: 8px;
}

.login-container input {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.login-container button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

.login-container button:hover {
    background-color: #45a049;
}

/* Tambahkan gaya untuk pesan kesalahan jika diperlukan */
.error-message {
    color: #ff0000;
    margin-top: 10px;
    text-align: center;
}

    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Form</h2>
        <form action="dashbord.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
