<?php
$conn = mysqli_connect("localhost", "root", "", "db_hewan");

if ($conn) {
    echo "Koneksi berhasil!";
} else {
    echo "Koneksi gagal!";
}
?>