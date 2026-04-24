<?php
$conn = mysqli_connect("localhost", "root", "", "streaming");
define('BASE_URL', 'http://localhost/streaming/');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>