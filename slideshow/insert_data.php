<?php
$servername = "localhost";
$username = "root";
$password = "Suvcark9!";
$dbname = "iot_latihan";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $nama_sensor = htmlspecialchars($_GET["nama_sensor"]); // 'sensor_A';
    $nilai = htmlspecialchars($_GET["nilai"]); //34;
    $waktu = date("Y-m-d H:i:s");
    $sql = "INSERT INTO tampung_data (id_data,nama_sensor,nilai,waktu) VALUES
(NULL,'$nama_sensor','$nilai','$waktu')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
