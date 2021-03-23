<?php
session_start();
include "koneksi/koneksi.php";
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  if ($include == "konfirmasi-login") {
    include("include/konfirmasilogin.php");
  } else if ($include == "signout") {
    include("include/signout.php");
  } else if ($include == "konfirmasi-tambah-kategori-buku") {
    include("include/konfirmasitambahkategoribuku.php");
  } else if ($include == "konfirmasi-edit-kategori-buku") {
    include("include/konfirmasieditkategoribuku.php");
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head.php") ?>
</head>

<?php
//cek ada get include 
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  //cek apakah ada session id admin 
  if (isset($_SESSION['id_user'])) { ?>

    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
          <?php
          if ($include == "kategori-buku") {
            include("include/kategoribuku.php");
          } else if ($include == "tambah-kategori-buku") {
            include("include/tambahkategoribuku.php");
          } else if ($include == "edit-kategori-buku") {
            include("include/editkategoribuku.php");
          } else if ($include == "kategori-blog") {
            include("include/kategoriblog.php");
          } else {
            include("include/profil.php");
          }
          ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
  <?php
  } else {
    //pemanggilan halaman form login 
    include("include/login.php");
  }
} else {
  if (isset($_SESSION['id_user'])) {
    //pemanggilan ke halaman-halaman profil jika ada session 
  ?>

    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
          <?php
          //pemanggilan profil 
          include("include/profil.php"); ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
<?php } else {
    //pemanggilan halaman form login 
    include("include/login.php");
  }
}
?>

</html>