<?php
require '../inc/inc_koneksi.php';
$fullname = $_POST["fullname"];
$username = $_POST["username"];
$institution = $_POST["institution"];
$email = $_POST["email"];
$password = $_POST["password"];

$query_sql = "INSERT INTO tbl_users (fullname, username, institution, email, password) 
            VALUES ('$fullname', '$username', '$institution', '$email', '$password')";

if (mysqli_query($koneksi, $query_sql)) {
    header("Location: ../login/login.html");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($koneksi);
}
