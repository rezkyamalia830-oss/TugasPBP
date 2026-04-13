<?php

$host = 'localhost';
$db   = 'db_hewan';
$user = 'root';
$pass = '';

// ==========================
// KONEKSI DATABASE (PDO)
// ==========================
$dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Koneksi DB gagal: " . $e->getMessage());
}

// ==========================
// INPUT DATA (CLI)
// ==========================
$id = readline("Masukkan ID hewan: ");
$nama = readline("Masukkan nama hewan baru: ");
$jenis = readline("Masukkan jenis hewan: ");
$umur = readline("Masukkan umur hewan: ");

// validasi
if ($id == "" || $nama == "" || $jenis == "" || $umur == "") {
    die("Input tidak boleh kosong!\n");
}

// ==========================
// QUERY UPDATE
// ==========================
$sql = "UPDATE hewan SET nama_hewan = ?, jenis = ?, umur = ? WHERE id = ?";
$update = $pdo->prepare($sql);

try {
    $update->execute([$nama, $jenis, $umur, $id]);

    if ($update->rowCount() > 0) {
        echo "Data hewan berhasil diupdate\n";
    } else {
        echo "ID tidak ditemukan atau data sama\n";
    }

} catch (PDOException $e) {
    echo "Update gagal: " . $e->getMessage() . "\n";
}
?>
