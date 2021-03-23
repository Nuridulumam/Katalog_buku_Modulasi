<?php
if (isset($_SESSION['id_konten'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $date =  date("Y-m-d");
    $tanggal = $date;
if (empty($judul)) {
    header("Location:tambahkonten.php?notif=tambahkosong& jenis=judul");
} else if (empty($isi)) {
    header("Location:tambahkonten.php?notif=tambahkosong& jenis=isi");
} else {
    $sql = "INSERT INTO `konten` (`judul`, `isi`,`tanggal`) VALUES ('$judul', '$isi','$tanggal')";
    mysqli_query($koneksi, $sql);
    //echo 
    header("Location:index.php?include=konten&notif=tambahberhasil");
}
}
?>