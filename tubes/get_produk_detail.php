<?php
require "koneksi.php";

if (!isset($_GET["nama"])) {
  echo "Product ID not provided.";
  exit;
}

$nama = $_GET["nama"];

$queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama = '$nama'");
$data = mysqli_fetch_assoc($queryProduk);

if (!$data) {
  echo "Product not found.";
  exit;
}

// Mengembalikan data produk dalam format JSON
header("Content-Type: application/json");
echo json_encode($data);
