<?php
include '../process/conSQL.php';

// Dapatkan value dari tambahMhsForm.php


$nama = $_POST["nama_barang"];
$harga = $_POST["harga"];
$stok = $_POST["stok"];
$foto = $_FILES['foto']['name'];
move_uploaded_file($_FILES['foto']['tmp_name'], "../img/$foto");

$query = "INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `foto`) VALUES (NULL, '$nama', '$harga', '$stok', '$foto')";


if(mysqli_query($con,$query)) {
    header("location: ../admin.php");
} else {
    echo "Gagal";
}
?>