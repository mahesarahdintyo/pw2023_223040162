<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "didntwakeupstore");

// Cek jika form disubmit
if (isset($_POST['submit'])) {
  // Mendapatkan data dari form
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $detail = $_POST['detail'];

  // Proses upload foto jika ada
  if ($_FILES['foto']['name'] != "") {
    $foto = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];
    $folder = "foto/";

    // Pindahkan foto ke folder foto
    move_uploaded_file($temp, $folder . $foto);

    // Update data ke tabel dengan foto baru
    $query = "UPDATE produk SET nama = '$nama', harga = '$harga', detail = '$detail', foto = '$foto' WHERE id = '$id'";
  } else {
    // Update data ke tabel tanpa mengubah foto
    $query = "UPDATE produk SET nama = '$nama', harga = '$harga', detail = '$detail' WHERE id = '$id'";
  }

  mysqli_query($koneksi, $query);

  // Redirect kembali ke halaman utama
  header("Location: produk.php");
}
?>


<!DOCTYPE html>
<html>

<head>
  <title>Edit Data</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1>Edit Data</h1>
    <hr>

    <?php
    // Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "didntwakeupstore");

    // Mendapatkan data berdasarkan ID
    $id = $_GET['id'];
    $query = "SELECT * FROM produk WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
      <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
      </div>
      <div class="form-group">
        <label for="harga">Harga:</label>
        <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $data['harga']; ?>" required>
      </div>
      <div class="form-group">
        <label for="foto">Foto:</label>
        <input type="file" class="form-control" id="foto" name="foto">
      </div>
      <div class="form-group">
        <label for="detail">Detail:</label>
        <textarea class="form-control" id="detail" name="detail" required><?php echo $data['detail']; ?></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</body>

</html>