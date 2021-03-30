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
                    $sql_cek_data = "SELECT `b`.`cover`,`k`.`kategori_buku`,`b`.`judul`,`b`.`pengarang`, `b`.`tahun_terbit`,`p`.`penerbit`, `b`.`sinopsis`,`b`.`id_kategori_buku`, `b`.`id_buku`, `tg`.`id_tag` FROM `buku` `b` INNER JOIN `kategori_buku` `k` ON `b`.`id_kategori_buku`=`k`.`id_kategori_buku` INNER JOIN `penerbit` `p` ON `b`.`id_penerbit`= `p`.`id_penerbit` INNER JOIN `tag` `tg` WHERE `tg`.`id_tag`='$id_tag_buku'";
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
                            echo "<div class='col-md-12'>
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
                    <div class="pl-4 pb-4">
                        <h4 class="font-italic">Kategori</h4>
                        <ol class="list-unstyled mb-0">
                            <li><a href="#">Umum</a></li>
                            <li><a href="#">PHP</a></li>
                            <li><a href="#">Java</a></li>
                            <li><a href="#">Database</a></li>
                            <li><a href="#">Techno</a></li>
                    </div>

                    <div class="p-4">
                        <h4 class="font-italic">Tag</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">PHP</a></li>
                            <li><a href="#">MySQL</a></li>
                            <li><a href="#">Javascript</a></li>
                        </ol>
                    </div>
                </aside> <!-- /.katalog-sidebar -->

            </div><!-- /.row -->
        </main><!-- /.container -->
    </section><br><br>

    </html>