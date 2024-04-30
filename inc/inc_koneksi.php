<?php
$host = "localhost";
$user = "root";
$pass = "";
$db =   "kelompok3";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){
    die ("Gagal terkoneksi");
}
else{
    echo"";
}
