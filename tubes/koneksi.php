<?php
$conn = mysqli_connect('localhost', 'root', '', 'didntwakeupstore');

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}

function registrasi($data)
{
  // ambil data dari tiap elemen dalam form
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);


  // cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert('Username sudah terdaftar!');
        </script>";
    return false;
  }

  // cek konfirmasi password
  if ($password != $password2) {
    echo "<script>
            alert('Password tidak sama');
        </script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambahkan user baru ke database
  $query = "INSERT INTO user VALUES(null, '$username', '$password', 'user')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
