<?php
    session_start();
    include ("process/conSQL.php");
    $id_barang  = $_GET[id];
    $id_user = $_SESSION["id"];
    if ($id_barang!=null){
        $query = "insert into cart (id_barang,id_user) values ('$id_barang','$id_user')";
        if(mysqli_query($con,$query)) {
            header("location: cart.php");
        } else {
            header("location: add_cart.php?id=$id_barang");
        }
    }else{
        header("location:landing.php");
    }
