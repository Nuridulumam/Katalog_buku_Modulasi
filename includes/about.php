<section id="blog-header">
    <div class="container">
        <h1 class="text-white">ABOUT US</h1>
    </div>
</section><br><br>
<?php
$sql_k = "SELECT `judul`, `isi` FROM `konten` WHERE `id_konten`='1'";
$query_k = mysqli_query($koneksi, $sql_k);
while ($data_k = mysqli_fetch_row($query_k)) {
    $judul_konten = $data_k[0];
    $isi_konten = $data_k[1];

?>

    <section id="blog-list">
        <main role="main" class="container">
            <div class="row">
                <div class="col-md-9 blog-main">
                    <div class="blog-post">
                        <h2 class="blog-post-title"><?php echo $judul_konten; ?></h2>
                        <p class="lead"><?php echo $isi_konten; ?></p>
                    <?php } ?>

                    </div><br><br><!-- /.blog-post -->
                </div><!-- /.blog-main -->

            </div><!-- /.row -->

        </main><!-- /.container -->
    </section><br><br>