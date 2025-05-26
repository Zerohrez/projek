<?php
include '../config.php';

// Pastikan 'nik' diambil dari URL atau form
if (isset($_GET['nik'])) {
    $nik = $conn->real_escape_string($_GET['nik']); // Escaping untuk keamanan

    // Query untuk menghapus data karyawan berdasarkan nik
    $sql = "DELETE FROM karyawan WHERE nik='$nik'";

    if ($conn->query($sql) === TRUE) {
        echo "Karyawan berhasil dihapus";
        // Redirect setelah berhasil menghapus
        header("Location: karyawan.php");
        exit; // Stop eksekusi setelah redirect
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "NIK tidak ditemukan dalam request.";
}

$conn->close();
?>