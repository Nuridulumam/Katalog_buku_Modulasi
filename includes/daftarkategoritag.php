<section id="blog-header">
    <div class="container">
        <h1 class="text-white">DAFTAR KATEGORI BUKU</h1>
    </div>
</section><br><br>
<?php
if (isset($_GET['data'])) {
    $id_tag_buku = $_GET['data'];
    $sql_tag = "SELECT `tag` FROM `tag` WHERE `id_tag`='$id_tag_buku'";
    $query_tag = mysqli_query($koneksi, $sql_tag);
    while ($data_tag = mysqli_fetch_row($query_tag)) {
        $tag = $data_tag[0];
    } ?>
    <section id="katalog-item">
        <main role="main" class="container">
            <h2 class='text-primary'>Tag: <?php echo $tag; ?></h2><br><br>
            <div class='row'>
                <div class='col-md-9 katalog-main'>
                    <div class='row'>
                    <?php
                    $sql_cek_data = "SELECT `b`.`cover`,`k`.`kategori_buku`,`b`.`judul`,`b`.`pengarang`, `b`.`tahun_terbit`,`p`.`penerbit`, `b`.`sinopsis`,`b`.`id_kategori_buku`, `b`.`id_buku`, `tg`.`id_tag` FROM `buku` `b` INNER JOIN `kategori_buku` `k` ON `b`.`id_kategori_buku`=`k`.`id_kategori_buku` INNER JOIN `penerbit` `p` ON `b`.`id_penerbit`= `p`.`id_penerbit` INNER JOIN `tag_buku` `tb` ON `b`.`id_buku`=`tb`.`id_buku` INNER JOIN `tag` `tg` ON `tg`.`id_tag`=`tb`.`id_tag` WHERE `tb`.`id_tag`='$id_tag_buku'";
                    $query_jum = mysqli_query($koneksi, $sql_cek_data);
                    $jum_data = mysqli_num_rows($query_jum);
                    $hasil = ceil($jum_data);
                    while ($data_d = mysqli_fetch_row($query_jum)) {
                        $cover = $data_d[0];
                        $kategori_buku = $data_d[1];
                        $judul_buku = $data_d[2];
                        $pengarang = $data_d[3];
                        $tahun_terbit = $data_d[4];
                        $penerbit = $data_d[5];
                        $sinopsis = $data_d[6];
                        $id_kategori_buku = $data_d[7];
                        $id_buku = $data_d[8];
                        $tag_buku = $data_d[9];

                        if ($hasil == 0) {
                            echo "<div class='col-md-4'>
                                    <h4 class='font-italic'>Data tidak ditemukan</h4>
                                        </div>";
                        } else {
                            echo "<div class='col-md-4'>
                            <div class='card-deck'>
                                <div class='card mb-4 shadow-sm'>
                                <img src='admin/cover/$cover' class='card-img-top' height='300px' alt='$judul_buku' title='$judul_buku'>
                                    <div class='card-body bg-warning'>
                                        <p class='card-text'>$judul_buku</p>
                                        <div class='d-flex justify-content-between align-items-center'>
                                            <div class='btn-group'>
                                                <a href='index.php?include=detail-buku&data=$id_buku' class='btn btn-primary stretched-link'>Detail</a>
                                            </div>
                                            <small class='text-muted'>
                                                $penerbit</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
                        }
                    }
                }
                    ?>

                    </div><!-- .row-->
                </div><!-- /.katalog-main -->

                <aside class="col-md-3 katalog-sidebar">
                    <!-- categories -->
                    <div class="pb-4">
                        <h5 class="font-italic bg-info text-white rounded p-2">Kategori</h5>
                        <ol class="list-group list-group-flush mb-0">
                            <?php $sql_k = "SELECT `id_kategori_buku`,`kategori_buku` FROM `kategori_buku` ORDER BY `kategori_buku`";
                            $query_k = mysqli_query($koneksi, $sql_k);
                            while ($data_k = mysqli_fetch_row($query_k)) {
                                $id_kat = $data_k[0];
                                $nama_kat = $data_k[1]; ?>
                                <li class="list-group-item"><a href="index.php?include=daftar-buku-kategori&data=<?php echo $id_kat; ?>"><?php echo $nama_kat; ?></a></li>
                            <?php } ?>
                        </ol>
                    </div>

                    <!-- list tag buku -->
                    <h5 class="font-italic bg-info text-white rounded p-2">Tag</h5>
                    <ol class="list-group list-group-flush mb-5">
                        <?php $sql_t = "SELECT `id_tag`,`tag` FROM `tag` ORDER BY `tag`";
                        $query_t = mysqli_query($koneksi, $sql_t);
                        while ($data_t = mysqli_fetch_row($query_t)) {
                            $id_tag = $data_t[0];
                            $nama_tag = $data_t[1]; ?>
                            <li class="list-group-item"><a href="index.php?include=daftar-buku-tag&data=<?php echo $id_tag; ?>"> <?php echo $nama_tag; ?></a></li>
                        <?php } ?>
                    </ol>
            </div>
            </aside> <!-- /.katalog-sidebar -->

            </div><!-- /.row -->
        </main><!-- /.container -->
    </section><br><br>

    </html>