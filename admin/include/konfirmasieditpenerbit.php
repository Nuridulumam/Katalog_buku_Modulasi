<?php
if (isset($_SESSION['id_penerbit'])) {
    $id_penerbit = $_SESSION['id_penerbit'];
    $penerbit = $_POST['penerbit'];
    $alamat_penerbit = $_POST['alamat'];
    if (empty($penerbit)) {
        header("Location:index.php?include=edit-penerbit&data=" . $id_kategori_penerbit . "¬if=editkosong");
    } else {
        $sql = "update `penerbit` set `penerbit`='$penerbit', `alamat`='$alamat_penerbit' where `id_penerbit`='$id_penerbit'";
        mysqli_query($koneksi, $sql);
        header("Location:index.php?include=penerbit&notif=editberhasil");
    }
}
