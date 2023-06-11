<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "didntwakeupstore");

// Mendapatkan data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];

// Update data ke tabel
$query = "UPDATE kategori SET nama = '$nama' WHERE id = '$id'";
mysqli_query($koneksi, $query);

// Redirect kembali ke halaman utama
header("Location: admin.php");
