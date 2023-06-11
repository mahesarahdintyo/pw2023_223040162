<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "didntwakeupstore");

// Mendapatkan data dari form
$nama = $_POST['nama'];

// Insert data ke tabel
$query = "INSERT INTO kategori (nama) VALUES ('$nama')";
mysqli_query($koneksi, $query);

// Redirect kembali ke halaman utama
header("Location: admin.php");
