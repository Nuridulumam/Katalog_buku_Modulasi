<section id="blog-header">
    <div class="container">
        <h1 class="text-white">CONTACT US</h1>
    </div>
</section><br><br>
<section id="blog-list">
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-9">
                <form action="index.php?include=input-pesan" method="POST">
                    <fieldset>
                        <legend>Form Contact Us</legend><br>
                        <div class="pesan">
                            <?php if (!empty($_GET['notif'])) { ?>
                                <?php if ($_GET['notif'] == "pesanterkirim") { ?>
                                    <div class="alert alert-success" role="alert"> Terimakasih! Pesan anda sudah terkirim</div>
                                <?php } else if ($_GET['notif'] == "pesangagal") { ?>
                                    <div class="alert alert-warning" role="alert"> Upps! Harap periksa kembali data anda</div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" id="inputNama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputPesan" name="pesan" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div><!-- /.blog-main -->

        </div><!-- /.row -->

    </main><!-- /.container -->
</section><br><br>