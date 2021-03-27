<?php
$penerbit = $_POST['penerbit'];
$alamat_penerbit = $_POST['alamat'];
if (empty($penerbit)) {
    header("Location:index.php?include=tambah-penerbit&notif=tambahkosong&jenis=penerbit");
} else if (empty($alamat_penerbit)) {
    header("Location:index.php?include=tambah-penerbit&notif=tambahkosong&jenis=alamat penerbit");
} else {
    $sql = "insert into `penerbit` (`penerbit`, `alamat`) values ('$penerbit', '$alamat_penerbit')";
    mysqli_query($koneksi, $sql);
    header("Location:index.php?include=penerbit&notif=tambahberhasil");
}
