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
    $query = "SELECT * FROM kategori WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    ?>

    <form action="proses_edit.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
      <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</body>

</html>