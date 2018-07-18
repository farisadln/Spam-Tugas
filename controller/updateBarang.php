<?php
include '../process/conSQL.php';


if (isset($_POST['btn-update'])) {

    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $foto = $_POST['foto'];
    $kategori = $_POST['kategori'];
    $foto = $_FILES['file']['name'];
    $kategori = $_POST['kategori'];
    $tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp, '../img/' . $foto);

    $query = "UPDATE" . barang . " SET  nama_barang='$nama', harga='$harga', stok='$stok', foto='$foto', kategori='$kategori', WHERE id_barang='$id' ";


    if (mysqli_query($con, $query)) {
        header("location: ../admin.php");
    } else {
        echo "Gagal";
    }
}

        var_dump($_barang);


?>