<?php
// Mendapatkan nilai parameter GET 'nama'
$nama = $_GET['nama'];

// Tambahkan koneksi ke database dan query sesuai dengan nama produk
require "koneksi.php";
$queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama = '$nama'");
$data = mysqli_fetch_array($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Detail</title>

<!-- Memasukkan Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style>
  body {
    background-color: black;
    color: white;
  }
</style>

</head>


<body>
  <div class="container">
    <h1 class="mt-5">Product Detail: <?php echo $data['nama']; ?></h1>
    <div class="row mt-4">
      <div class="col-md-6">
        <img src="admin/foto/<?php echo $data['foto']; ?>" alt="Product Image" class="img-fluid">
      </div>
      <div class="col-md-6">
        <p><strong>Price:</strong> <?php echo $data['harga']; ?></p>
        <p><strong>Description:</strong> <?php echo $data['detail']; ?></p>
        <!-- Tombol Kembali -->
        <a href="index.php#products" class="btn btn-primary">Back to Products</a>
      </div>
    </div>
  </div>


  <!-- Memasukkan Bootstrap JS (opsional, tergantung kebutuhan) -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>