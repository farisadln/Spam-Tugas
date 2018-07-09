<?php
include 'process/conSQL.php';

$uname = $_POST["uname"];
$pass = $_POST["pass"];
$level = $_POST["level"];

$query = "insert into lat_user (uname, pass, level) values ('$uname', '$pass', 'user')";

if(mysqli_query($con,$query)) {
    header("location: indexLogin.php?pesan='selamat anda bisa login sekarang!'");
} else {
    header("location: formRegister.php?pesan=maaf username yang anda gunakan sudah ada !");
}
?>