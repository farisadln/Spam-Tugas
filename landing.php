<?php

session_start();
include("process/conSQL.php");
$username = $_SESSION["uname"];


?>

<!DOCTYPE html>
<html lang="en">

<?php
 include("header.php");
?>
<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop01.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Laptop<br>Collection</h3>
                        <a href="shop_laptop.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop03.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Accessories<br>Collection</h3>
                        <a href="shop_acc.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop02.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Gadget<br>Collection</h3>
                        <a href="shop_gadget.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->



<!-- HOT DEAL SECTION -->

    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <?php

            $sql = "select * from barang";
            $result = mysqli_query($con,$sql);
            while ($show = mysqli_fetch_array($result)) {
                ?>
                <!-- product -->
                <div class="col-md-4 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="./img/product01.png" alt="">
                        </div>
                        <div class="product-body">
                            <h4 class="product-category"><?php echo $show['kategori']?></h4>
                            <h3 class="product-name"><a href="#"><?php echo $show['nama_barang']?></a></h3>
                            <h4 class="product-price">Rp.<?php echo $show['harga']?></h4>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

<!-- /HOT DEAL SECTION -->
<!-- bottom footer -->
<div id="bottom-footer" class="section">
    <div class="container">
        <!-- row -->

    </div>
    <!-- /container -->
</div>
<!-- /bottom footer -->

<!-- /FOOTER -->
<!--Timer-->
<script type="text/javascript">
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
    initializeClock('clockdiv', deadline);
</script>

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>

