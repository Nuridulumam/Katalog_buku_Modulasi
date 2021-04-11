<!DOCTYPE html>
<html>
<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_user = $_GET['data'];
    //get cover 
    $sql_hb = "SELECT `usermame` FROM `user` WHERE `id_user`='$id_user'";
    $query_b = mysqli_query($koneksi, $sql_hb);

    $sql_dm = "delete from `user` where `id_user` = '$id_user'";
    mysqli_query($koneksi, $sql_dm);
  }
}

if (isset($_POST["katakunci"])) {
  $katakunci_blog = $_POST["katakunci"];
  $_SESSION['katakunci_blog'] = $katakunci_blog;
}
if (isset($_SESSION['katakunci_blog'])) {
  $katakunci_blog = $_SESSION['katakunci_blog'];
}
?>

<head>
  <?php include("includes/head.php") ?>
</head>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-user-tie"></i> Data User</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Data User</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Data User</h3>
      <div class="card-tools">
        <a href="index.php?include=tambah-user" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah User</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="col-md-12">
        <form method="post" action="index.php?include=user">
          <div class="row">
            <div class="col-md-4 bottom-10">
              <input type="text" class="form-control" id="kata_kunci" name="kunci2">
            </div>
            <div class="col-md-5 bottom-10">
              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
            </div>
          </div><!-- .row -->
        </form>
      </div><br>
      <div class="col-sm-12">
        <?php if (!empty($_GET['notif'])) { ?>
          <?php if ($_GET['notif'] == "tambahberhasil") { ?>
            <div class="alert alert-success" role="alert"> Data Berhasil Ditambahkan</div>
          <?php } else if ($_GET['notif'] == "editberhasil") { ?>
            <div class="alert alert-success" role="alert"> Data Berhasil Diubah</div>
          <?php } ?>
        <?php } ?>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="30%">Nama</th>
            <th width="30%">Email</th>
            <th width="20%">Level</th>
            <th width="15%">
              <center>Aksi</center>
            </th>
          </tr>
        </thead>
        <?php
        $batas = 6;
        if (!isset($_GET['halaman'])) {
          $posisi = 0;
          $halaman = 1;
        } else {
          $halaman = $_GET['halaman'];
          $posisi = ($halaman - 1) * $batas;
        }

        $sql_user = "SELECT * FROM `user`  ";
        if (!empty($katakunci_user)) {
          $sql_user .= "where `nama` LIKE '%$katakunci_user%'";
        }
        $sql_user .= " ORDER BY `level` limit $posisi, $batas";
        $query_user = mysqli_query($koneksi, $sql_user);
        $posisi = 1;
        while ($data_user = mysqli_fetch_row($query_user)) {
          $id_user = $data_user[0];
          $nama = $data_user[1];
          $email = $data_user[2];
          $username = $data_user[3];
          $level = $data_user[5];
        ?>
          <tbody>
            <tr>
              <td class="p-3"><?= $posisi; ?></td>
              <td class="p-3"><?= $nama; ?></td>
              <td class="p-3"><?= $email; ?></td>
              <td class="p-3"><?= $level; ?></td>
              <td class="p-3" align="center">
                <a href="index.php?include=edit-user&data=<?php echo $id_user; ?>" class="btn btn-xs btn-info">
                  <i class="fas fa-edit"></i> </a>
                <a href="index.php?include=detail-user&data=<?php echo $id_user; ?>" class="btn btn-xs btn-info">
                  <i class="fas fa-eye"></i> </a>
                <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $id_user; ?>?')) window.location.href='index.php?include=user&aksi=hapus&data=<?php echo $id_user; ?>¬if=hapusberhasil'" class="btn btn-xs btn-warning">
                  <i class="fas fa-trash"></i> </a>
              </td>
            </tr>
          <?php $posisi++;
        } ?>
          </tbody>
      </table>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
      <!-- pagination -->
      <?php
      $sql_jum = "SELECT `b`.`id_blog`, `b`.`judul`, `b`.`tanggal`, `k`.`kategori_blog` FROM `blog` `b` INNER JOIN `kategori_blog` `k` ON `b`.`id_kategori_blog` = `k`.`id_kategori_blog` ";
      if (!empty($katakunci_blog)) {
        $sql_jum .= " where `b`.`judul` LIKE '%$katakunci_blog%'";
      }
      $sql_jum .= " ORDER BY `k`.`kategori_blog`, `b`.`Judul`";
      $query_jum = mysqli_query($koneksi, $sql_jum);
      $jum_data = mysqli_num_rows($query_jum);
      $jum_halaman = ceil($jum_data / $batas);

      if ($jum_halaman == 0) {
        echo 'tidak ada halaman';
      } else if ($jum_halaman == 1) {
        echo "<li class='page-item'><a class='page-link'>1</a></li>";
      } else {
        $sebelum = $halaman - 1;
        $setelah = $halaman + 1;

        if ($halaman != 1) {
          echo "<li class='page-item'><a class='page-link' href='index.php?include=blog&halaman=1'>First</a></li>";
          echo "<li class='page-item'><a class='page-link' href='index.php?include=blog&halaman=$sebelum'>«</a></li>";
        }
        for ($i = 1; $i <= $jum_halaman; $i++) {
          if ($i > $halaman - 5 and $i < $halaman + 5) {
            if ($i != $halaman) {
              echo "<li class='page-item'><a class='page-link' href='index.php?include=blog&halaman=$i'>$i</a></li>";
            } else {
              echo "<li class='page-item'><a class='page-link'>$i</a></li>";
            }
          }
        }
        if ($halaman != $jum_halaman) {
          echo "<li class='page-item'><a class='page-link' href='index.php?include=blog&halaman=$setelah'> »</a></li>";
          echo "<li class='page-item'><a class='page-link' href='index.php?include=blog&halaman=$jum_halaman'>Last</a></li>";
        }
      } ?>
    </ul>
  </div>
  </div>
  <!-- /.card -->

</section>

</html>