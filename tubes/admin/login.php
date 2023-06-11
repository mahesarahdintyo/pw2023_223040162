<?php
session_start();
require '../koneksi.php';

// Cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // Ambil username berdasarkan id
  $result = mysqli_query($conn, "SELECT id, username, role FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  // Cek cookie dan username
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION["login"] = true;
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['id'] = $row['id'];
  }
}

if (isset($_SESSION["login"])) {
  header("location: ../index.php");

  exit;
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // Cek username
  if (mysqli_num_rows($result) === 1) {
    // Cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      // Set session
      $_SESSION["login"] = true;
      $_SESSION["username"] = $username;
      $_SESSION["role"] = $row['role'];
      $_SESSION["id"] = $row["id"];



      // Redirect ke halaman sesuai peran
      if ($row['role'] === 'admind') {
        header("Location: admin.php");
        exit;
      } else if ($row['role'] === 'user') {
        header("Location: ../index.php");
        exit;
      } else {
        echo "Anda tidak memiliki akses.";
      }
    } else {
      $error = true;
    }
  } else {
    $error = true;
  }
}



if (isset($_POST["register"])) {

  if (registrasi($_POST) > 0) {
    echo "<script>
          alert('Registration Successful.');
          </script>";
  } else {
    echo mysqli_error($conn);
  }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <title>Document</title>
</head>

<style>
  /* mulai form */
  @import url("https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  html,
  body {
    display: grid;
    height: 100%;
    width: 100%;
    place-items: center;
    background: -webkit-linear-gradient(left, #93deff, #fff);
  }

  ::selection {
    background: #93deff;
    color: #fff;
  }

  .wrapper {
    overflow: hidden;
    max-width: 390px;
    background: #fff;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
  }

  .wrapper .title-text {
    display: flex;
    width: 200%;
  }

  .wrapper .title {
    width: 50%;
    font-size: 35px;
    font-weight: 600;
    text-align: center;
    transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }

  .wrapper .slide-controls {
    position: relative;
    display: flex;
    height: 50px;
    width: 100%;
    overflow: hidden;
    margin: 30px 0 10px 0;
    justify-content: space-between;
    border: 1px solid lightgrey;
    border-radius: 5px;
  }

  .slide-controls .slide {
    height: 100%;
    width: 100%;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    text-align: center;
    line-height: 48px;
    cursor: pointer;
    z-index: 1;
    transition: all 0.6s ease;
  }

  .slide-controls label.signup {
    color: #000;
  }

  .slide-controls .slider-tab {
    position: absolute;
    height: 100%;
    width: 50%;
    left: 0;
    z-index: 0;
    border-radius: 5px;
    background: -webkit-linear-gradient(left, #93deff, #93deff);
    transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }

  input[type="radio"] {
    display: none;
  }

  #signup:checked~.slider-tab {
    left: 50%;
  }

  #signup:checked~label.signup {
    color: #fff;
    cursor: default;
    user-select: none;
  }

  #signup:checked~label.login {
    color: #000;
  }

  #login:checked~label.signup {
    color: #000;
  }

  #login:checked~label.login {
    cursor: default;
    user-select: none;
  }

  .wrapper .form-container {
    width: 100%;
    overflow: hidden;
  }

  .form-container .form-inner {
    display: flex;
    width: 200%;
  }

  .form-container .form-inner form {
    width: 50%;
    transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }

  .form-inner form .field {
    height: 50px;
    width: 100%;
    margin-top: 20px;
  }

  .form-inner form .field input {
    height: 100%;
    width: 100%;
    outline: none;
    padding-left: 15px;
    border-radius: 5px;
    border: 1px solid lightgrey;
    border-bottom-width: 2px;
    font-size: 17px;
    transition: all 0.3s ease;
  }

  .form-inner form .field input:focus {
    border-color: #93deff;
    /* box-shadow: inset 0 0 3px ##93deff; */
  }

  .form-inner form .field input::placeholder {
    color: #666;
    transition: all 0.3s ease;
  }

  form .field input:focus::placeholder {
    color: #666;
  }

  .form-inner form .pass-link {
    margin-top: 5px;
  }

  .form-inner form .signup-link {
    text-align: center;
    margin-top: 30px;
  }

  .form-inner form .pass-link a,
  .form-inner form .signup-link a {
    color: #93deff;
    text-decoration: none;
  }

  .form-inner form .pass-link a:hover,
  .form-inner form .signup-link a:hover {
    text-decoration: underline;
  }

  form .btn {
    height: 50px;
    width: 100%;
    border-radius: 5px;
    position: relative;
    overflow: hidden;
  }

  form .btn .btn-layer {
    height: 100%;
    width: 300%;
    position: absolute;
    left: -100%;
    background: -webkit-linear-gradient(right,
        #93deff,
        #93deff,
        #93deff,
        #93deff);
    border-radius: 5px;
    transition: all 0.4s ease;
  }

  form .btn:hover .btn-layer {
    left: 0;
  }

  form .btn input[type="submit"] {
    height: 100%;
    width: 100%;
    z-index: 1;
    position: relative;
    background: none;
    border: none;
    color: #fff;
    padding-left: 0;
    border-radius: 5px;
    font-size: 20px;
    font-weight: 500;
    cursor: pointer;
  }

  /* terakhir form */



  .main {
    height: 100vh;
  }

  .login-box {
    width: 500px;
    height: 300px;
    box-sizing: border-box;
    border-radius: 10px;
  }
</style>

<body>
  <div class="wrapper">
    <div class="title-text">
      <div class="title login">Login</div>
      <div class="title signup">Registrasi</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked />
        <input type="radio" name="slide" id="signup" />
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Registrasi</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">
        <form action="" method="post" class="login">
          <div class="field">
            <input type="text" name="username" placeholder="Masukan Username" required />
          </div>
          <div class="field">
            <input type="password" name="password" placeholder="Masukan Password" required />
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" name="login" value="Login" />
          </div>
          <div class="signup-link">
            Belum Punya Akun? <a href="">Daftar Sekarang</a>
          </div>
        </form>
        <form action="#" method="post" class="signup">
          <div class="field">
            <input type="text" name="username" placeholder="Masukan Username" required />
          </div>
          <div class="field">
            <input type="password" name="password" placeholder="Masukan Password" required />
          </div>
          <div class="field">
            <input type="password" name="password2" placeholder="Konfirmasi password" required />
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" name="register" value="Daftar" />
          </div>

          <div class="mt-3">
            <?php if (isset($_POST['loginbtn'])) {
              $username = htmlspecialchars($_POST['username']);
              $password = htmlspecialchars($_POST['password']);

              $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
              $countdata = mysqli_num_rows($query);
              $data = mysqli_fetch_array($query);

              if ($countdata > 0) {
                if (password_verify($password, $data['password'])) {
                  $_SESSION['username'] = $data['username'];
                  $_SESSION['login'] = true;
                  header('location: ../adminpanel');
                } else {
            ?>
                  <div class="alert alert-warning" role="alert">
                    Password salah
                  </div>
                <?php
                }
              } else {
                ?>
                <div class="alert alert-warning" role="alert">
                  Akun tidak tersedia
                </div>
            <?php
              }
            }
            ?>
          </div>

        </form>
      </div>
    </div>
  </div>
  <script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = () => {
      loginForm.style.marginLeft = "-50%";
      loginText.style.marginLeft = "-50%";
    };
    loginBtn.onclick = () => {
      loginForm.style.marginLeft = "0%";
      loginText.style.marginLeft = "0%";
    };
    signupLink.onclick = () => {
      signupBtn.click();
      return false;
    };
  </script>
  <div class="mt-3" style="width: 500px">

  </div>
  </div>
</body>

</html>