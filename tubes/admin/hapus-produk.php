<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "didntwakeupstore");

// Mendapatkan ID yang akan dihapus
$id = $_GET['id'];

// Hapus data berdasarkan ID
$query = "DELETE FROM produk WHERE id = '$id'";
mysqli_query($koneksi, $query);

// Redirect kembali ke halaman utama
header("Location: produk.php");
