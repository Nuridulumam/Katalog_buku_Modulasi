<section id="blog-header">
    <div class="container">
        <h1 class="text-white">Detail Blog</h1>
    </div>
</section> <br><br>

<section id="blog-list">
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-9 blog-main">
                <div class="blog-post">
                    <?php
                    if (isset($_GET['data'])) {
                        $id_blog = $_GET['data'];

                        $sql_d = "SELECT `b`.`judul`,`b`.`isi`, `b`.`tanggal`, `k`.`kategori_blog`, `u`.`nama` FROM `blog` `b` INNER JOIN `kategori_blog` `k` ON `b`.`id_kategori_blog` = `k`.`id_kategori_blog` INNER JOIN `user` `u` ON `b`.`id_user`= `u`.`id_user` WHERE `b`.`id_blog`='$id_blog'";
                        $query_d = mysqli_query($koneksi, $sql_d);
                        while ($data_d = mysqli_fetch_row($query_d)) {
                            $kategori_blog = $data_d[3];
                            $judul = $data_d[0];
                            $isi = $data_d[1];
                            $tanggal = $data_d[2];
                            $date = new DateTime($tanggal);
                            $nama = $data_d[4];
                        }
                    ?>

                        <h2 class="blog-post-title"><?= $judul; ?></h2>
                        <p class="blog-post-meta"><?= $date->format('F d, Y'); ?> by <a href="#"><?= $nama; ?></a></p>

                        <p><?= $isi; ?></p>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- blog terkait -->
            <aside class="col-md-3 blog-sidebar">
                <!-- categories -->
                <div class="pb-4">
                    <h5 class="font-italic bg-info text-white rounded p-2">Kategori</h5>
                    <ol class="list-group list-group-flush mb-0">
                        <?php $sql_k = "SELECT `id_kategori_blog`,`kategori_blog` FROM `kategori_blog` ORDER BY `kategori_blog`";
                        $query_k = mysqli_query($koneksi, $sql_k);
                        while ($data_k = mysqli_fetch_row($query_k)) {
                            $id_kat = $data_k[0];
                            $nama_kat = $data_k[1]; ?>
                            <li class="list-group-item"><a href="index.php?include=daftar-blog&data=<?php echo $id_kat; ?>"><?php echo $nama_kat; ?></a></li>
                        <?php } ?>
                    </ol>
                </div>

                <!-- list archive blog -->
                <h5 class="font-italic bg-info text-white rounded p-2">Archives</h5>
                <ol class="list-group list-group-flush mb-5">
                    <?php $sql_t = "SELECT `id_blog`,`tanggal` FROM `blog` GROUP BY `tanggal`";
                    $query_t = mysqli_query($koneksi, $sql_t);
                    while ($data_t = mysqli_fetch_row($query_t)) {
                        $id_blog = $data_t[0];
                        $Tanggal = $data_t[1]; ?>
                        <li class="list-group-item"><a href="index.php?include=daftar-archive&data=<?php echo $Tanggal; ?>"> <?php echo $Tanggal; ?></a></li>
                    <?php } ?>
                </ol>
            </aside>

        </div>
</section>