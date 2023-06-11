<!DOCTYPE html>
<html>

<head>
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <!-- navbar start-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">didntwakeupstore.</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="produk.php">Products</a>
          </li>
        </ul>
        <span class="navbar-text">
          <a class="nav-link" href="logout.php">Log Out</a>
        </span>
      </div>
    </div>
  </nav>

  <!-- navbar end -->
  <div class="container">
    <h1>Kategori</h1>
    <hr>

    <!-- Tombol Tambah Data -->
    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>

    <!-- Tabel Data -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Koneksi ke database
        $koneksi = mysqli_connect("localhost", "root", "", "didntwakeupstore");

        // Mendapatkan data dari tabel
        $query = "SELECT * FROM kategori ORDER BY id ASC";
        $result = mysqli_query($koneksi, $query);
        $jumlah = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $jumlah++ . "</td>";
          echo "<td>" . $row['nama'] . "</td>";
          echo "<td>";
          echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a> ";
          echo "<a href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>