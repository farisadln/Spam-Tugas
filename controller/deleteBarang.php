<?php
include '../process/conSQL.php';


$id = $_GET["id"];

$query = "DELETE FROM " . barang . " WHERE id_barang=$id";

if(mysqli_query($con,$query)) {
    header("location: ../admin.php");
} else {
    echo "Gagal";
}
?>