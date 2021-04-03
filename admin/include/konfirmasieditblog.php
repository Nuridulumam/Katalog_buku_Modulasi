<?php
if (isset($_SESSION['id_blog'])) {
    $id_blog = $_SESSION['id_blog'];
    $id_kategori_blog = $_POST['kategori_blog'];
    $judul = $_POST['judul'];
    $sinopsis = $_POST['sinopsis'];
    $isi = $_POST['isi'];
    $date =  date("Y-m-d");
    $tanggal = $date;
    if (empty($id_kategori_blog)) {
        header("Location:index.php?include=edit-blog&data=" . $id_kategori_blog . "&notif=editkosong");
    } else if (empty($judul)) {
        header("Location:index.php?include=edit-blog&data=" . $judul . "&notif=editkosong");
    } else if (empty($isi)) {
        header("Location:index.php?include=edit-blog&data=" . $isi . "&notif=editkosong");
    } else if (empty($sinopsis)) {
        header("Location:index.php?include=edit-blog&data=" . $sinopsis . "&notif=editkosong");
    } else {
        $sql = "UPDATE `blog` set `id_kategori_blog`='$id_kategori_blog',`judul`='$judul', `sinopsis`='$sinopsis', `isi`='$isi', `tanggal`='$tanggal' WHERE `id_blog`='$id_blog'";
        mysqli_query($koneksi, $sql);

        header("Location:index.php?include=blog&notif=editberhasil");
    }
}
