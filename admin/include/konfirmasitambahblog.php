<?php
$id_kategori_blog = $_POST['kategori_blog'];
$judul = $_POST['judul'];
$sinopsis = $_POST['sinopsis'];
$isi = $_POST['isi'];
$id_user = 1;
$date =  date("Y-m-d");
$tanggal = $date;
if (empty($id_kategori_blog)) {
    header("Location:tambahblog.php?notif=tambahkosong& jenis=kategoribuku");
} else if (empty($judul)) {
    header("Location:tambahblog.php?notif=tambahkosong& jenis=judul");
} else if (empty($sinopsis)) {
    header("Location:tambahblog.php?notif=tambahkosong& jenis=sinopsis");
} else if (empty($isi)) {
    header("Location:tambahblog.php?notif=tambahkosong& jenis=isi");
} else {
    $sql = "INSERT INTO `blog` (`id_blog`,`id_kategori_blog`,`id_user`,`tanggal`, `judul`, `sinopsis`, `isi`) VALUES ('$id_blog','$id_kategori_blog','$id_user', '$tanggal', '$judul', '$sinopsis', '$isi')";
    mysqli_query($koneksi, $sql);
    //echo 
    header("Location:index.php?include=blog&notif=tambahberhasil");
}
