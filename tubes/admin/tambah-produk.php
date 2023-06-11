<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "didntwakeupstore");

// Fungsi tambah produk
function tambahProduk($koneksi, $nama, $harga, $foto, $detail)
{
  // Escape karakter khusus pada inputan
  $nama = mysqli_real_escape_string($koneksi, $nama);
  $harga = mysqli_real_escape_string($koneksi, $harga);
  $detail = mysqli_real_escape_string($koneksi, $detail);

  // Upload foto ke server (asumsikan menggunakan direktori "uploads")
  $namaFoto = $_FILES['foto']['name'];
  $tmpFoto = $_FILES['foto']['tmp_name'];
  move_uploaded_file($tmpFoto, "foto/" . $namaFoto);

  // Insert data ke tabel
  $query = "INSERT INTO produk (nama, harga, foto, detail) VALUES ('$nama', '$harga', '$namaFoto', '$detail')";
  mysqli_query($koneksi, $query);

  // Redirect kembali ke halaman utama
  header("Location: produk.php");
}

// Cek jika form disubmit
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $detail = $_POST['detail'];

  // Panggil fungsi tambah produk
  tambahProduk($koneksi, $nama, $harga, $_FILES['foto'], $detail);
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Tambah Produk</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1>Tambah Produk</h1>
    <hr>

    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>
      <div class="form-group">
        <label for="harga">Harga:</label>
        <input type="text" class="form-control" id="harga" name="harga" required>
      </div>
      <div class="form-group">
        <label for="foto">Foto:</label>
        <input type="file" class="form-control" id="foto" name="foto" required>
      </div>
      <div class="form-group">
        <label for="detail">Detail:</label>
        <textarea class="form-control" id="detail" name="detail" required></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</body>

</html>