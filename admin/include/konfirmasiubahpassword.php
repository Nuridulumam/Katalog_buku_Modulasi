<?php
$id_user = $_POST['id_user'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$password = md5($pass2);
if (empty($pass1)) {
    header("Location:index.php?include=ubah-password&data=" . $id_user . "&notif=passwordkosong");
} else if (empty($pass2)) {
    header("Location:index.php?include=ubah-password&data=" . $id_user . "&notif=passwordkosong");
} else if ($pass1 != $pass2) {
    header("Location:index.php?include=ubah-password&data=" . $id_user . "&notif=passwordsalah");
} else if ($pass1 == $pass2) {
    $sql = "UPDATE `user` set `password`='$password' where `id_user`='$id_user'";
    mysqli_query($koneksi, $sql);
    header("Location:index.php?include=ubah-password&notif=editberhasil");
}
