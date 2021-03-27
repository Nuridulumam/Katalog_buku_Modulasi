<?php
if (isset($_SESSION['id_konten'])) {
    $id_konten = $_SESSION['id_konten'];    
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    if (empty($judul)) {
        header("Location:index.php?include=edit-konten&data=".$judul."&notif=editkosong");
    } else if (empty($isi)) {
        header("Location:index.php?include=edit-konten&data=".$isi."&notif=editkosong");
    } else {
            $sql = "UPDATE `konten` set `judul`='$judul', `isi`='$isi' WHERE `id_konten`='$id_konten'";
            mysqli_query($koneksi, $sql);
        
        header("Location:index.php?include=konten&notif=editberhasil");
    }
}
?>