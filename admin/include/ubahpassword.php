<!DOCTYPE html>
<html>

<?php
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
}
?>

<head>
    <?php include("includes/head.php") ?>
</head>



<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-edit"></i> Ubah Password</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?include=profil">Profil</a></li>
                    <li class="breadcrumb-item active">Ubah Password</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Ubah Password</h3>
            <div class="card-tools">
                <a href="index.php?include=profil" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        </br>
        <div class="col-sm-10">
            <?php if (!empty($_GET['notif'])) { ?>
                <?php if ($_GET['notif'] == "passwordkosong") { ?>
                    <div class="alert alert-danger" role="alert">Maaf Password tidak boleh kosong!</div>
                <?php } else if ($_GET['notif'] == "passwordsalah") { ?>
                    <div class="alert alert-danger" role="alert">Maaf konfirmasi password salah!</div>
                <?php } else if ($_GET['notif'] == "editberhasil") { ?>
                    <div class="alert alert-success" role="alert">Ubah Password Berhasil</div>
                <?php } ?>
            <?php } ?>
        </div>
        <form class="form-horizontal" method="POST" action="index.php?include=konfirmasi-ubah-password">
            <div class="card-body">
                <div class="form-group row">
                    <label for="foto" class="col-sm-12 col-form-label">
                        <span class="text-info">
                            <i class="fas fa-key"></i>
                            <u>Ubah Password</u>
                        </span>
                    </label>
                </div>
                <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                <div class="form-group row">
                    <label for="password1" class="col-sm-3 col-form-label">Password Baru</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" name="pass1" id="pass1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password2" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" name="pass2" id="pass2">
                    </div>
                </div>
            </div> <!-- /.card-body -->
            <div class="card-footer">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-info float-right"> <i class="fas fa-save"></i> Simpan</button>
                </div>
            </div> <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
<!-- ./wrapper -->


</html>