<?php
$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$pass = $_POST['password'];
$password = md5($pass);
$level = $_POST['level'];
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
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
    echo $lokasi_file;
    echo $nama_file;
    $direktori = 'foto/' . $nama_file;
    move_uploaded_file($lokasi_file, $direktori);
    $sql = "INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `level`, `foto`) values ('', '$nama', '$email', '$username', '$password', '$level', '$nama_file') ";
    mysqli_query($koneksi, $sql);
    header("Location:index.php?include=user&notif=tambahberhasil");
}
