<!doctype html>
<html lang="en">
<?php include("koneksi/koneksi.php"); ?>

<head>
  <?php include("include/head.php"); ?>
</head>

<body>
  <?php include("include/navigasi.php"); ?>

  <?php
  //pemanggilan konten halaman index

  if (isset($_GET["include"])) {
    $include = $_GET["include"];
    if ($include == "detail-buku") {
      include("includes/detailbuku.php");
    } else if ($include == "detail-blog") {
      include("includes/detailblog.php");
    } else if ($include == "daftar-buku-kategori") {
      include("includes/daftarkategoribuku.php");
    } else if ($include == "daftar-buku-tag") {
      include("includes/daftarkategoritag.php");
    }
    // blog
    else if ($include == "daftar-blog") {
      include("includes/daftarblog.php");
    } else if ($include == "daftar-archive") {
      include("includes/daftararchive.php");
    } else {
      include("include/index.php");
    }
  } else {
    include("include/index.php");
  }
  ?>

  <footer class="bg-primary text-dark">
    <?php include("include/footer.php"); ?>
  </footer>

  <!-- Optional JavaScript; choose one of the two! -->
  <?php include("include/script.php"); ?>
</body>

</html>