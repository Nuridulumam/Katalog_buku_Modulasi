<?php
session_start();
include "koneksi/koneksi.php";
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  if ($include == "konfirmasi-login") {
    include("include/konfirmasilogin.php");
  } else if ($include == "signout") {
    include("include/signout.php");
  }
  // kategori buku
  else if ($include == "konfirmasi-tambah-kategori-buku") {
    include("include/konfirmasitambahkategoribuku.php");
  } else if ($include == "konfirmasi-edit-kategori-buku") {
    include("include/konfirmasieditkategoribuku.php");
  }
  // kategori blog
  else if ($include == "konfirmasi-tambah-kategori-blog") {
    include("include/konfirmasitambahkategoriblog.php");
  } else if ($include == "konfirmasi-edit-kategori-blog") {
    include("include/konfirmasieditkategoriblog.php");
  }
  // Tag
  else if ($include == "konfirmasi-tambah-tag") {
    include("include/konfirmasitambahtag.php");
  } else if ($include == "konfirmasi-edit-tag") {
    include("include/konfirmasiedittag.php");
  }
  // Penerbit
  else if ($include == "konfirmasi-tambah-penerbit") {
    include("include/konfirmasitambahpenerbit.php");
  } else if ($include == "konfirmasi-edit-penerbit") {
    include("include/konfirmasieditpenerbit.php");
  }
  // Buku 
  else if ($include == "konfirmasi-tambah-buku") {
    include("include/konfirmasitambahbuku.php");
  } else if ($include == "konfirmasi-edit-buku") {
    include("include/konfirmasieditbuku.php");
  }
  // profil
  else if ($include == "konfirmasi-edit-profil") {
    include("include/konfirmasieditprofil.php");
  }
  // blog
  else if ($include == "konfirmasi-edit-blog") {
    include("include/konfirmasieditblog.php");
  } else if ($include == "konfirmasi-tambah-blog") {
    include("include/konfirmasitambahblog.php");
  }
  // konten
  else if ($include == "konfirmasi-edit-konten") {
    include("include/konfirmasieditkonten.php");
  } else if ($include == "konfirmasi-tambah-konten") {
    include("include/konfirmasitambahkonten.php");
  }
  // USER
  else if ($include == "konfirmasi-tambah-user") {
    include("include/konfirmasitambahuser.php");
  } else if ($include == "konfirmasi-edit-user") {
    include("include/konfirmasiedituser.php");
  } else if ($include == "konfirmasi-ubah-password") {
    include("include/konfirmasiubahpassword.php");
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
          // Kategori Buku
          if ($include == "kategori-buku") {
            include("include/kategoribuku.php");
          } else if ($include == "tambah-kategori-buku") {
            include("include/tambahkategoribuku.php");
          } else if ($include == "edit-kategori-buku") {
            include("include/editkategoribuku.php");
          }
          // Kategori Blog
          else if ($include == "kategori-blog") {
            include("include/kategoriblog.php");
          } else if ($include == "tambah-kategori-blog") {
            include("include/tambahkategoriblog.php");
          } else if ($include == "edit-kategori-blog") {
            include("include/editkategoriblog.php");
          }
          // tag
          else if ($include == "tag") {
            include("include/tag.php");
          } else if ($include == "tambah-tag") {
            include("include/tambahtag.php");
          } else if ($include == "edit-tag") {
            include("include/edittag.php");
          }
          // Penerbit
          else if ($include == "penerbit") {
            include("include/penerbit.php");
          } else if ($include == "tambah-penerbit") {
            include("include/tambahpenerbit.php");
          } else if ($include == "edit-penerbit") {
            include("include/editpenerbit.php");
          }
          // Konten
          else if ($include == "konten") {
            include("include/konten.php");
            // buku 
          } else if ($include == "buku") {
            include("include/buku.php");
          } else if ($include == "tambah-buku") {
            include("include/tambahbuku.php");
          } else if ($include == "edit-buku") {
            include("include/editbuku.php");
          } else if ($include == "detail-buku") {
            include("include/detailbuku.php");
            // blog
          } else if ($include == "blog") {
            include("include/blog.php");
          } else if ($include == "detail-blog") {
            include("include/detailblog.php");
          } else if ($include == "edit-blog") {
            include("include/editblog.php");
          } else if ($include == "tambah-blog") {
            include("include/tambahblog.php");
            // konten
          } else if ($include == "edit-konten") {
            include("include/editkonten.php");
          } else if ($include == "tambah-konten") {
            include("include/tambahkonten.php");
          } else if ($include == "detail-konten") {
            include("include/detailkonten.php");
          } else if ($include == "edit-profil") {
            include("include/editprofil.php");
          }
          // user
          else if ($include == "user") {
            include("include/user.php");
          } else if ($include == "tambah-user") {
            include("include/tambahuser.php");
          } else if ($include == "detail-user") {
            include("include/detailuser.php");
          } else if ($include == "edit-user") {
            include("include/edituser.php");
          } else if ($include == "ubah-password") {
            include("include/ubahpassword.php");
          }
          // pesan
          else if ($include == "pesan") {
            include("include/pesan.php");
          } else if ($include == "detail-pesan") {
            include("include/detailpesan.php");
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