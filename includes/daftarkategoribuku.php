<section id="buku-header">
    <div class="container">
        <h1 class="text-white">DAFTAR KATEGORI BUKU</h1>
    </div>
</section><br><br>

<?php
if (isset($_GET['data'])) {
    $id_kategori_buku = $_GET['data'];
    $sql_kategori_buku = "SELECT `kategori_buku` FROM `kategori_buku` WHERE `id_kategori_buku`='$id_kategori_buku'";
    $query_kategori_buku = mysqli_query($koneksi, $sql_kategori_buku);
    while ($data_kategori_buku = mysqli_fetch_row($query_kategori_buku)) {
        $kategori_buku = $data_kategori_buku[0];
    } ?>
    <section id="katalog-item">
        <main role="main" class="container">
            <h2 class='text-primary'>Kategori: <?php echo $kategori_buku; ?></h2><br><br>
            <div class='row'>
                <div class='col-md-9 katalog-main'>
                    <div class='row'>
                        <?php
                        $batas = 1;
                        if (!isset($_GET['halaman'])) {
                            $posisi = 0;
                            $halaman = 1;
                        } else {
                            $halaman = $_GET['halaman'];
                            $posisi = ($halaman - 1) * $batas;
                        }
                        $sql_cek_data = "SELECT `b`.`cover`, `k`.`kategori_buku`, `b`.`judul`,`b`.`pengarang`, `b`.`tahun_terbit`,`p`.`penerbit`, `b`.`sinopsis`,`b`.`id_kategori_buku`, `b`.`id_buku` FROM `buku` `b` INNER JOIN `kategori_buku` `k` ON `b`.`id_kategori_buku`=`k`.`id_kategori_buku` INNER JOIN `penerbit` `p` ON `b`.`id_penerbit`= `p`.`id_penerbit` WHERE `b`.`id_kategori_buku`='$id_kategori_buku' ";
                        $sql_cek_data .= " ORDER BY `k`.`kategori_buku`, `b`.`judul` limit $posisi, $batas ";
                        $query_jum = mysqli_query($koneksi, $sql_cek_data);
                        $jum_data = mysqli_num_rows($query_jum);
                        $hasil = ceil($jum_data);
                        $posisi = 1;
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
                        }
                        if ($hasil == 0) {
                        ?>
                            <div class='col-md-4'>
                                <h4 class='font-italic'> Data tidak Ditemukan </h4>
                            </div>
                    </div><!-- .row-->
                <?php } else { ?>
                    <div class='col-md-4'>
                        <div class='card-deck'>
                            <div class='card mb-4 shadow-sm'>
                                <img src='admin/cover/<?= $cover ?>' class='card-img-top' height='300px' alt='<?= $judul_buku; ?>' title='<?= $judul_buku ?>'>
                                <div class='card-body bg-warning'>
                                    <p class='card-text'>
                                        <? $judul_buku; ?>
                                    </p>
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class='btn-group'>
                                            <a href='index.php?include=detail-buku&data=$id_buku' class='btn btn-primary stretched-link'>Detail</a>
                                        </div>
                                        <small class='text-muted'>
                                            <?= $penerbit; ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .row-->
                <?php

                            $sql_cek_data = "SELECT `b`.`cover`,`k`.`kategori_buku`,`b`.`judul`,`b`.`pengarang`, `b`.`tahun_terbit`,`p`.`penerbit`, `b`.`sinopsis`,`b`.`id_kategori_buku`, `b`.`id_buku` FROM `buku` `b` INNER JOIN `kategori_buku` `k` ON `b`.`id_kategori_buku`=`k`.`id_kategori_buku` INNER JOIN `penerbit` `p` ON `b`.`id_penerbit`= `p`.`id_penerbit` WHERE `b`.`id_kategori_buku`='$id_kategori_buku'";
                            $sql_cek_data .= " ORDER BY `k`.`kategori_buku`, `b`.`judul`";
                            $query_jum = mysqli_query($koneksi, $sql_cek_data);
                            $jum_data = mysqli_num_rows($query_jum);
                            $jum_halaman = ceil($jum_data / $batas);

                            if ($jum_halaman == 0) {
                                echo 'tidak ada halaman';
                            } else if ($jum_halaman == 1) {
                                echo " <a class='btn btn-outline-secondary disabled' href='#' aria-disabled='true'>Older</a>";
                                echo "<a class='btn btn-outline-secondary disabled' href='#' tabindex='-1' aria-disabled='true'>Newer</a>";
                            } else {
                                $sebelum = $halaman - 1;
                                $setelah = $halaman + 1;


                                if ($halaman > 1 && $halaman < $jum_halaman) {
                                    echo " <a class='btn btn-outline-primary' href='index.php?include=daftar-buku-kategori&data=$id_kategori_buku&halaman=$setelah' >Older</a>";
                                    echo "<a class='btn btn-outline-primary'href='index.php?include=daftar-buku-kategori&data=$id_kategori_buku&halaman=$sebelum' >Newer</a>";
                                } else if ($halaman != 1) {
                                    echo " <a class='btn btn-outline-secondary disabled' href='index.php?include=daftar-buku-kategori&data=$id_kategori_buku&halaman=$setelah' aria-disabled='true' >Older</a>";
                                    echo "<a class='btn btn-outline-primary' href='index.php?include=daftar-buku-kategori&data=$id_kategori_buku&halaman=$sebelum' tabindex='-1'>Newer</a>";
                                } else if ($halaman != $jum_halaman) {
                                    echo " <a class='btn btn-outline-primary' href='index.php?include=daftar-buku-kategori&data=$id_kategori_buku&halaman=$setelah' >Older</a>";
                                    echo "<a class='btn btn-outline-secondary disabled' href='index.php?include=daftar-buku-kategori&data=$id_kategori_buku&halaman=$sebelum' tabindex='-1' aria-disabled='true'>Newer</a>";
                                }
                            } ?>
                </nav>
        <?php }
                    }
        ?>
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