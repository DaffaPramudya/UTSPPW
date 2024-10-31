<?php
// Tentukan direktori penyimpanan
$targetDir = "uploads/";

// Pastikan direktori penyimpanan ada
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Ambil informasi file yang diunggah
$fileName = basename($_FILES["fileUpload"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

// Periksa apakah file sudah diunggah dan ada kesalahan
if (isset($_FILES["fileUpload"]) && $_FILES["fileUpload"]["error"] == 0) {
    // Tentukan tipe file yang diizinkan (contoh: gambar, PDF, dll.)
    $allowedTypes = array("jpg", "jpeg", "png", "gif", "pdf");

    // Periksa tipe file
    if (in_array($fileType, $allowedTypes)) {
        // Pindahkan file ke direktori penyimpanan
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $targetFilePath)) {
            echo "File berhasil diunggah: " . htmlspecialchars($fileName);
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "Maaf, hanya file dengan tipe JPG, JPEG, PNG, GIF, & PDF yang diizinkan.";
    }
} else {
    echo "Tidak ada file yang diunggah atau terjadi kesalahan saat mengunggah.";
}
?>
