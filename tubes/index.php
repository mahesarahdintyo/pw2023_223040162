<?php

require "koneksi.php";

$queryProduk = mysqli_query($conn, "SELECT * FROM produk");

if (isset($_GET["nama"])) {
  $nama = $_GET["nama"];
  // Gunakan variabel $nama sesuai kebutuhan
} else {
  // Lakukan tindakan jika variabel 'nama' tidak ada dalam URL
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>didntwakeupstore.</title>

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />

  <!-- feather icons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- my style -->
  <link rel="stylesheet" href="css/style.css" />

  <style>
    @media print {
      .no-print {
        display: none !important;
      }
    }
  </style>
</head>

<body>
  <!-- navbar start-->
  <nav class="navbar">
    <a href="#" class="navbar-logo">didntwakeup<span>store.</span></a>

    <div class="navbar-nav">
      <a href="#">Home</a>
      <a href="#about">About Us</a>
      <a href="#menu">Menu</a>
      <a href="#products">Products</a>
      <a href="#contact">Contact</a>
      <a href="../tubes/admin/logout.php">Logout</a>>
      <div class=“container no-print”>
        <button onclick="window.print()">
          <i class=“bi bi-journal plus”>Print</i>
        </button>
      </div>
    </div>
    <div class="navbar-extra">
      <a href="#" id="search-button"><i data-feather="search"></i></a>
      <!-- <a href="#" id="shopping-cart-button"><i data-feather="shopping-cart"></i></a> -->
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    <!-- search from start -->
    <div class="search-form">
      <input type="search" id="search-box" placeholder="search here..." />
      <label for="search-box"><i data-feather="search"></i></label>
    </div>

    <!-- search from end -->

    <!-- shopping cart start -->
    <!-- <div class="shopping-cart">
      <div class="cart-item">
        <img src="img/menu/6.png" alt="Product 1" />
        <div class="item-detail">
          <h3>- The Doll -</h3>
          <div class="item-price">IDR : 2.999.999,00</div>
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
      </div>
      <div class="cart-item">
        <img src="img/menu/2.png" alt="Product 1" />
        <div class="item-detail">
          <h3>- Mick Tompson Mask -</h3>
          <div class="item-price">IDR : 3.999.999,00</div>
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
      </div>
    </div> -->

    <!-- shopping cart end -->
  </nav>

  <!-- navbar end -->

  <!-- hero section start -->
  <section class="hero" id="home">
    <main class="content">
      <h1>Choose Whatever <span>U Want.</span></h1>
      <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, vitae.
      </p>
      <a href="#" class="cta">Buy Now!</a>
    </main>
  </section>
  <!-- hero section end -->

  <!-- about section start-->
  <section id="about" class="about">
    <h2><span>About</span> Us</h2>

    <div class="row">
      <div class="about-img">
        <img src="img/tentang kami3.jpg" alt="About Us" />
      </div>
      <div class="content">
        <h3>Why Choose Us ?</h3>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis,
          eveniet cumque? Fugiat ratione delectus quis at velit facere
          possimus dolorem.
        </p>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas
          rem, vel nesciunt enim harum eius ipsam ducimus eaque voluptates
          adipisci.
        </p>
      </div>
    </div>
  </section>
  <!-- about section end-->

  <!-- menu section start-->
  <section id="menu" class="menu">
    <h2><span>Me</span>nu</h2>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis,
      nobis accusamus molestias voluptas consequuntur
    </p>

    <div class="row">
      <div class="menu-card">
        <img src="img/menu/1.png" alt="mask" class="menu-card-img" />
        <h3 class="menu-card-title">- Joey Mask -</h3>
        <p class="menu-card-price">IDR 3.999.999,00</p>
      </div>
      <div class="menu-card">
        <img src="img/menu/2.png" alt="mask" class="menu-card-img" />
        <h3 class="menu-card-title">- Mick Thomson Mask -</h3>
        <p class="menu-card-price">IDR 5.999.999,00</p>
      </div>
      <div class="menu-card">
        <img src="img/menu/3.png" alt="mask" class="menu-card-img" />
        <h3 class="menu-card-title">- Key Chains -</h3>
        <p class="menu-card-price">IDR 799.999,00</p>
      </div>
      <div class="menu-card">
        <img src="img/menu/4.png" alt="mask" class="menu-card-img" />
        <h3 class="menu-card-title">- Clown Mask -</h3>
        <p class="menu-card-price">IDR 4.999.999,00</p>
      </div>
      <div class="menu-card">
        <img src="img/menu/5.png" alt="mask" class="menu-card-img" />
        <h3 class="menu-card-title">- Baseball Bats -</h3>
        <p class="menu-card-price">IDR 8.999.999,00</p>
      </div>
      <div class="menu-card">
        <img src="img/menu/6.png" alt="mask" class="menu-card-img" />
        <h3 class="menu-card-title">- The Doll -</h3>
        <p class="menu-card-price">IDR 50.999.999,00</p>
      </div>
    </div>
  </section>
  <!-- menu section end-->

  <!-- product section start -->

  <section id="products" class="products">
    <h2><span>Our Superior</span> Product</h2>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque hic,
      eaque error illo nisi eius?
    </p>

    <div class="row">
      <?php while ($data = mysqli_fetch_array($queryProduk)) { ?>
        <div class="product-card">
          <div class="product-icons">
            <!-- <a href="#"><i data-feather="shopping-cart"></i></a> -->
            <a href="detail.php?nama=<?php echo $data['nama']; ?>" class=""><i data-feather="eye"></i></a>

          </div>
          <div class="product-image">
            <img src="admin/foto/<?php echo $data['foto'] ?>" alt="Product 1" />
          </div>
          <div class="product-content">
            <h3>- <?php echo $data['nama']; ?> -</h3>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
            </div>
            <div class="product-price">
              IDR :<?php echo $data['harga']; ?> <span>IDR : 50.999.999,00</span>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

  </section>

  <!-- product section end -->

  <!-- contact section start-->
  <section id="contact" class="contact">
    <h2><span>Contact</span> Us</h2>
    <p>
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae,
      quis.
    </p>

    <div class="row">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3201.2751707110315!2d-116.39856132460278!3d36.643830272292114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c70baaaaaaaaab%3A0x9f97481bfe85a9d8!2sArea%2051%20Alien%20Center!5e0!3m2!1sid!2sid!4v1685481036697!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

      <form action="">
        <div class="input-group">
          <i data-feather="user"></i>
          <input type="text" placeholder="Name" />
        </div>
        <div class="input-group">
          <i data-feather="mail"></i>
          <input type="text" placeholder="Email" />
        </div>
        <div class="input-group">
          <i data-feather="phone"></i>
          <input type="text" placeholder="Phone Number" />
        </div>
        <button type="submit" class="btn">Kirim Pesan</button>
      </form>
    </div>
  </section>
  <!-- contact section end-->

  <!-- footer start-->
  <footer>
    <div class="socials">
      <a href="#"><i data-feather="instagram"></i></a>
      <a href="#"><i data-feather="twitter"></i></a>
      <a href="#"><i data-feather="facebook"></i></a>
    </div>

    <div class="links">
      <a href="#home">Home</a>
      <a href="#about">About Us</a>
      <a href="#menu">Menu</a>
      <a href="#contact">Contact</a>
    </div>

    <div class="credit">
      <p>Created by <a href="">MahesaRahdintyo</a>. | &copy; 2023</p>
    </div>
  </footer>
  <!-- footer end-->


  <!-- feather icons -->
  <script>
    feather.replace();
  </script>

  <!-- my js -->
  <script src="js/script.js"></script>




</body>

</html>