<?php
session_start();
include("process/conSQL.php");
$id_user = $_SESSION["id"];
$query = "select b.* , c.* from barang b join cart c on b.id_barang = c.id_barang where c.id_user = $id_user";
$result = mysqli_query($con, $query);
include("header.php");


while ($show = mysqli_fetch_array($result)) {
    ?>

<center>
    <form method="post" action="">
    <div class="card ">
        <div class="card-header">
            --------------------
        </div>
        <div class="card-body">

            <h5 class="card-title"><input type="text" name="barang" value="<?= $show['nama_barang']?>" readonly > </h5>
            <h5 class="card-text"><input type="text" name="harga" value=" <?= $show['harga'] ?>" readonly></h5>
        </div>
    </div>

    <?php

    $total+=$show['harga'];
    echo "<input type='text' name='total' value='$total' readonly>";

    echo "<input type='hidden' name='total' value='$id_user' readonly>";



}


?>
        <br><input type="submit" name="checkout" value="checkout" >
    </form>
</center>



<?php

?>