<?php
// Koneksi ke database
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_menu = $_POST['nama_menu'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Proses upload file gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $target_dir = "../uploads/"; // Folder tempat menyimpan gambar
    $target_file = $target_dir . basename($gambar);

    // Validasi apakah file adalah gambar
    $check = getimagesize($tmp_name);
    if ($check !== false) {
        // Pindahkan gambar yang diupload ke folder tujuan
        if (move_uploaded_file($tmp_name, $target_file)) {
            // Query untuk memasukkan data ke dalam tabel menu
            $query = "INSERT INTO menu (nama_menu, kategori, harga, stok, gambar) 
                      VALUES ('$nama_menu', '$kategori', '$harga', '$stok', '$gambar')";

            if (mysqli_query($conn, $query)) {
                echo "Menu berhasil ditambahkan!";
                header('Location: menu.php'); // Arahkan kembali ke halaman menu setelah sukses
                exit;
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Gagal mengupload gambar.";
        }
    } else {
        echo "File yang diupload bukan gambar.";
    }
}

?>