<?php
function safe_html($str) {
    // Pastikan input string bukan null, bukan array, dan bukan objek
    if (!isset($str) || $str === null) {
        return '';
    }
    return htmlspecialchars((string)$str, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    
    $foto = $row['foto'] ?? '';
    $nik = $row['nik'] ?? '';
    $nama = $row['nama'] ?? '';
    $alamat = $row['alamat'] ?? '';
    $jabatan = $row['jabatan'] ?? '';

    $fotoPath = '../uploads/foto_karyawan/' . $foto;
    if (!file_exists($fotoPath) || empty($foto)) {
        $fotoPath = 'https://via.placeholder.com/50?text=No+Image';
    }
    
    echo "<td><img src='" . safe_html($fotoPath) . "' alt='Foto " . safe_html($nama) . "' style='width:50px; height:50px; object-fit:cover;'></td>";
    echo "<td>" . safe_html($nik) . "</td>";
    echo "<td>" . safe_html($nama) . "</td>";
    echo "<td>" . safe_html($alamat) . "</td>";
    echo "<td>" . safe_html($jabatan) . "</td>";
    echo "</tr>";
}
?>
