<?php
include 'process/conSQL.php';
session_start();
$error = '';

if(!empty($_POST["uname"]) || !empty($_POST["pass"])) {
    # Get username and password from user
    $username = $_POST["uname"];
    $password = $_POST["pass"];

    # Write MySql Query
    $query = "SELECT * FROM lat_user WHERE uname='$username' AND pass='$password'";
    # Get the query result
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $level = $row["level"];
        $_SESSION["status"] = 'login';
        $id = $row["id"];
        $_SESSION["id"] = $id;
        if($level == 1) {


            $_SESSION["uname"] = $username;
            $_SESSION["level"] = $level;
            header("Location: admin.php");
        } else {

            $_SESSION["uname"] = $username;
            $_SESSION["level"] = $level;
            header("Location: landing.php");
        }
    } else {
        $error = urlencode("Username atau password salah!");
        header("Location: indexLogin.php?pesan=$error");
    }

    # Close connection to database
    mysqli_close($con);

} else {
    echo "masuk";
    die();
    $error = urlencode("Username atau password kosong!");
    header("Location: indexLogin.php?pesan=$error");
}
?>