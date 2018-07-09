<?php
include '../process/conSQL.php';

// Dapatkan value dari updateMhsForm.php

$id = $_POST["id_barang"];
$nama = $_POST["nama_barang"];
$harga = $_POST["harga"];
$stok = $_POST["stok"];
$foto = $_POST["foto"];


$query = "UPDATE " .barang. " SET id_barang='$id', nama_barang='$nama', harga='$harga', stok='$stok', foto='$foto', WHERE id_barang=$id";


if(mysqli_query($con,$query)) {
    header("location: ../admin.php");
} else {
    echo "Gagal";
}
?>