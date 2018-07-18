<?php
include '../process/conSQL.php';


if (isset($_POST['btn-tambah'])) {

    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $foto = $_FILES['file']['name'];
    $kategori = $_POST['kategori'];
    $tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp, '../img/'.$foto);

    $query = "INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `foto`,`kategori`) VALUES (NULL, '$nama', '$harga', '$stok', '$foto', '$kategori')";


    if (mysqli_query($con, $query)) {
        header("location: ../admin.php");
    } else {
        echo "Gagal";
    }
}
?>