<?php
session_start();
include ("process/conSQL.php");
$id_user = $_SESSION["id"];
$query = "select b.* , c.* from barang b join cart c on b.id_barang = c.id_barang where c.id_user = $id_user";
$result = mysqli_query($con,$query);
include ("header.php");



while ($show = mysqli_fetch_array($result)) {
    ?>


    <div class="card">
        <div class="card-header">
            --------------------
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $show['nama_barang']?></h5>
            <h5 class="card-text"><?php echo $show['harga']?></h5>

        </div>

    </div>

    <?php
}

    ?>

<a href="#" class="btn btn-primary">Check Out</a>
