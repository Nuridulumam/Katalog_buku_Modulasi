<?php
$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$pass = $_POST['password'];
$level = $_POST['level'];
$lokasi_file = $_FILES['foto']['tmp_name'];
$nama_file = $_FILES['foto']['name'];
$direktori = 'foto/' . $nama_file;
chmod('foto/' . $_FILES['foto']['name'], 0777);
if (empty($nama)) {
    header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=nama");
} else if (empty($email)) {
    header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=email");
} else if (empty($username)) {
    header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=username");
} else if (empty($pass)) {
    header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=pass");
} else if (empty($level)) {
    header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=level");
} else {
    $sql = "INSERT INTO `user` (`nama`, `email`, `username`, `password`, `level`, `foto`) values ('$nama', '$email', '$username', MD5('$pass'), '$level', '$nama_file') ";
    mysqli_query($koneksi, $sql);
    header("Location:index.php?include=user&notif=tambahberhasil--$sql");
}
