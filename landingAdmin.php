<?php
session_start();

include 'process/conSQL.php';
if($_SESSION['status']!='login'){
//    var_dump($_SESSION);
    header("location:formLogin.php");

}
if($_SESSION['level']!='admin'){
    header("location:landingUser.php");
}
$username = $_SESSION["uname"];

?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load jQuery -->
    <script src="lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Load Bootstrap -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/customIndex.css">
    <title></title>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-secondary">

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="#" class="nav-link active">Data Barang</a></li>

            </ul>
            <ul class="header-links pull-right">

                <li><a href="Logout.php"> Logout </a></li>

            </ul>
        </div>
    </nav>
</header>
<main class="container" role="main">
    <div class="starter-template">
        <a class="btn btn-success" href="tambah.php">Tambah</a>
        <table class="table mt-2">
            <thead class="thead-dark">
            <tr>
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah Barang</th>
                <th>Gambar</th>
                <th colspan="2">Action</th>

                <!-- <th>
                  <a class="btn btn-warning" href="editMhsForm.php">Edit</a>
                  <a class="btn btn-danger" href="deleteMhs.php">Hapus</a>
                </th> -->
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM  barang";
            $result = mysqli_query($con, $query); // digunakan untuk melakukan query

            // mysqli_num_rows($result) > 0 digunakan untuk melakukan
            // pengecekan jumlah records hasil query lebih dari 0,
            // atau dengan kata lain, ada data didalam tabel database
            if(mysqli_num_rows($result) > 0){
                // mysqli_fetch_assoc($result) digunakan untuk mendapatkan nilai hasil query
                // dan disimpan kedalam variable $row
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>" . $row["id_barang"] . "</td>"; // mengambil nilai dari kolom "nim_mhs"
                    echo "<td>" . $row["nama_barang"] . "</td>";
                    echo "<td>" . $row["harga"] . "</td>";
                    echo "<td>" . $row["stok"] . "</td>";
                    echo "<td>" . $row["foto"] . "</td>";


                    // Kolom untuk tempat tombol edit dan delete
                    // Pada href kita harus mengirimkan id untuk kebutuhan filtering
                    // pada sat melakukan query
                    echo "<td>";
                    echo "<a class='btn btn-warning mr-2' href='update.php?id=".$row["id_barang"]."'>Update</a>";
                    echo "<a class='btn btn-danger' href='controller/deleteBarang.php?id=".$row["id_barang"]."'>Hapus</a>";
                    echo "</td>";
                    //

                    echo "</tr>";
                }
            }
            mysqli_close($con); // Tutup koneksi ke database
            ?>
            </tbody>
        </table>

    </div>
</main>

</body>
</html>