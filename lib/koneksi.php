<?php 
// definisikan koneksi ke database
$server ="localhost";
$username ="root";
$password ="root";
$database ="amikom";
// koneksi dan memilih database di server
$koneksi = mysqli_connect($server,$username,$password,$database);

if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL". mysqli_connect_error();
    exit();
}

?>