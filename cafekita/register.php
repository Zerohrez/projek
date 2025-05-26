<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);

    // Prepared statement to avoid SQL injection
    // Prepared statement to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO users (nama, username, password, jabatan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $username, $password, $jabatan);


    if ($stmt->execute()) {
        echo "<script>alert('Registrasi berhasil!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Registrasi gagal! Username mungkin sudah terdaftar.');</script>";
    }
    
    $stmt->close();
}
?>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container input[type="text"]{
            width: 100%;
            padding: 10px;
            margin: 8px 0 !important;
            border: 1px solid #ccc;
            border-radius: 5px !important;
        }

        .form-container input[type="password"]{
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            margin-right: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            margin-right: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button[type="submit"] {
            width: 100%;
            background-color: #3498db;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button[type="submit"]:hover {
            background-color: #2980b9;
        }

        .form-container p {
            text-align: center;
            font-size: 0.9em;
        }
    </style>
</head>
<div class="form-container">
<form method="post" action="">
    Nama: <input type="text" name="nama" required><br>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Jabatan: 
    <select name="jabatan" required>
        <option value="admin">Admin</option>
        <option value="kasir">Kasir</option>
        <option value="staff">Staff</option>
    </select><br>
    <button type="submit">Registrasi</button>
</form>
<p>Sudah punya akun? <a href="index.php">Login Disini</a></p>
</div>