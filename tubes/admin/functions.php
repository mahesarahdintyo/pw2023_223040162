<?php
// Fungsi untuk mendapatkan nama produk berdasarkan ID
function getProductName($id)
{
  global $koneksi;

  $query = "SELECT nama FROM produk WHERE id=$id";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_assoc($result);

  return $row['nama'];
}

// Fungsi untuk mendapatkan harga produk berdasarkan ID
function getProductPrice($id)
{
  global $koneksi;

  $query = "SELECT harga FROM produk WHERE id=$id";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_assoc($result);

  return $row['harga'];
}
