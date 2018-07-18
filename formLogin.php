<?php
session_start();

# If user still in session, redirect to profile.php instead of login again
if(isset($_SESSION['uname']) and isset($_SESSION['level'])){
    if($_SESSION['level'] == 'admin') {
        header("location: landingUser.php");
    } else {
        header("location: admin.php");
    }
}

if(isset($_GET['pesan'])) {
    $mess = "<p> {$_GET['pesan']}</p>";
} else {
    $mess = "";
}
?>
<html>
    <head>
        <title>Login</title>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/signin.css">
    </head>



    <!-- form login  -->

    <body class="text-center  ">

        <div class="container  ">
            <div class="card card-login mx-auto col-md-5">
             <div class="card-header"> Login </div>
              <div class="card-body">
              <form class="form-signin rounded shadow p-3 mb-5 bg-white rounded" action="login.php" method="POST">

                <input type="text" name="uname" class="form-control" placeholder="username">
                <ul></ul>
                <input type="password" name="pass" class="form-control" placeholder="password">
                <button class="btn btn-danger btn-lg" type="submit" name="submit">Login</button>
                    <p><?php echo $mess; ?></p>
              </form>
              </div>
             </div>
            </div>


    </body>
    <!-- login  -->

</html>