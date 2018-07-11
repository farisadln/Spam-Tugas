<?php
include '../process/conSQL.php';

// Dapatkan id dari index.php
$id = $_GET["id"];

$query = "DELETE FROM " . barang . " WHERE id_barang=$id";

if(mysqli_query($con,$query)) {
    header("location: ../landingAdmin.php");
} else {
    echo "Gagal";
}
?>