<!DOCTYPE html>
<html>
<?php
if (isset($_GET['data'])) {
    $id_pesan = $_GET['data'];
    //get data kategori pesan 
    $sql_pesan = "SELECT * FROM `pesan` where `id`='$id_pesan'";
    $query_pesan = mysqli_query($koneksi, $sql_pesan);
    while ($data_pesan = mysqli_fetch_row($query_pesan)) {
        $id_pesan = $data_pesan[0];
        $nama = $data_pesan[1];
        $email = $data_pesan[2];
        $pesan = $data_pesan[3];
    }
}
?>

<head>
    <?php include("includes/head.php") ?>
</head>


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-user-tie"></i> Detail Data Pesan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?include=pesan">Data Pesan</a></li>
                    <li class="breadcrumb-item active">Detail Data Pesan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="index.php?include=pesan" class="btn btn-sm btn-warning float-right">
                    <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%"><?php echo $nama; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Email<strong></td>
                        <td width="80%"><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Pesan<strong></td>
                        <td width="80%"><?php echo $pesan; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">&nbsp;</div>
    </div>
    <!-- /.card -->

</section>

</html>