<?php
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$date =  date("Y-m-d");
$tanggal = $date;
echo $tanggal;
if (empty($judul)) {
    header("Location:index.php?include=konten&notif=tambahkosong& jenis=judul");
} else if (empty($isi)) {
    header("Location:index.php?include=konten&notif=tambahkosong& jenis=isi");
} else {
    $sql = "INSERT INTO `konten` (`id_konten`, `judul`, `isi`, `tanggal`) VALUES ('', '$judul', '$isi', '$tanggal')";
    mysqli_query($koneksi, $sql);
    //echo 
    header("Location:index.php?include=konten&notif=tambahberhasil");
}
