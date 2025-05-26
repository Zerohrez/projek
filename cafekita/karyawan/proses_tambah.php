<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];

    // Proses unggah foto
    $foto = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $target_dir = "uploads/foto_karyawan/";
    $target_file = $target_dir . time() . "_" . basename($foto); // Nama file unik

    // Buat folder jika belum ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($tmp_name, $target_file)) {
        // Simpan data ke database
        $query = "INSERT INTO karyawan (nik, nama, alamat, jabatan, foto) VALUES ('$nik', '$nama', '$alamat', '$jabatan', '$target_file')";
        if (mysqli_query($conn, $query)) {
            header('Location: karyawan.php');
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengunggah foto.";
    }
}
?>
