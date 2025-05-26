<?php
include '../config.php';

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];

// Query untuk update data karyawan
$sql = "UPDATE karyawan SET nama='$nama', jabatan='$jabatan' WHERE nik='$nik'";

if ($conn->query($sql) === TRUE) {
    // Redirect ke halaman karyawan setelah berhasil di-update
    header("Location: karyawan.php");
    exit; // Pastikan untuk menghentikan eksekusi script setelah redirect
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
