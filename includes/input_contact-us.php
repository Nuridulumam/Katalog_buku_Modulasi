<?php
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];
if (empty($nama)) {
    header("Location:index.php?include=contact-us&notif=pesangagal");
} else if (empty($email)) {
    header("Location:index.php?include=contact-us&notif=pesangagal");
} else if (empty($pesan)) {
    header("Location:index.php?include=contact-us&notif=pesangagal");
} else {
    $sql = "insert into `pesan` (`id`, `nama`, `email`, `pesan`) values ('', '$nama', '$email', '$pesan')";
    mysqli_query($koneksi, $sql);
    header("Location:index.php?include=contact-us&notif=pesanterkirim");
}
