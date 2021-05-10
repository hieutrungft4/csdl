<?php
global $image;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Website</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="./style-desc-pro.css" />
</head>
<body>
<div class="contain">
    <div class="header">
        <div class="box-info">
            <div class="con-log">
                <i id="shop-cart" style="margin-right: 10px" class="fas fa-shopping-cart"></i>
                <style> #shop-cart:hover {color: #2828e8; cursor: pointer} </style>
                <?php
                session_start();
                echo '<span>Hi, ' .$_SESSION["username"] .'</span>';
                ?>
                <i id="sign-out" onclick="logout()" class="fas fa-1x fa-sign-out-alt"></i>
                <script>
                    function logout() {
                        location.href="../login/login.php";
                    }

                </script>
                <script>
                    document.querySelector('#shop-cart').addEventListener('click', () => {
                        location.href="../shoppingcart/shopping-cart.php";
                    });
                </script>
            </div>
        </div>
<!--        <div class="box-search">-->
<!--            <div class="search">-->
<!--                <input type="text" name="search-pro" id="search-pro" placeholder="Search products" />-->
<!--            </div>-->
<!--            <i id="search-icon" class="fas fa-1x fa-search"></i>-->
<!--        </div>-->
    </div>
    <div class="spacer"></div>
    <div class="main">
        <div class="con-ima">
<!--            <img id="ima" src="../admin/product-image/air-max-95-se-shoe-2vZQJ7.jpg" alt="Nothing" />-->
            <?php
            $s = "127.0.0.1";
            $u = "root";
            $p = "";
            $d = "projectcsdl";

            // Create connection
            $conn = mysqli_connect($s, $u, $p, $d);
            if (!$conn) {
//                echo "Connection error: " .mysqli_connect_error() ."<br />";
                die();
            }
            $query0 = "SELECT * FROM projectcsdl.product";
            $result0 = mysqli_query($conn, $query0);
            if ($result0) {
                $pro_id = "";
                if (isset($_GET["pro_id"])) {
                    $pro_id = $_GET["pro_id"];
                }
                while ($row = mysqli_fetch_assoc($result0)) {
                    if ($row["pro_id"] === $pro_id) {
                        echo '<img src="' ."../" .$row["pro_image"] .'" alt="Nothing" />';
//                        echo '<style> .con-ima > img {width: 400px; height: 400px; position: relative; top: 30px} </style>';
//                        echo '<i class="fas fa-2x fa-cart-plus"></i>';
                        if (isset($_GET['checked'])) {
                            if ($_GET['checked'] === '' || $_GET['checked'][strlen($_GET['checked'])-1] === '0') {
                                echo '<i id="car-pluspp" class="fas fa-2x fa-cart-plus" style="color: black"></i>';
                            }
                            else {
                                echo '<i id="fa-checkcc" class="fas fa-2x fa-check" style="color: green"></i>';
                            }
                        }
//                        echo '<style>.con-ima > i:hover {color: #9ccdbc; cursor: pointer}</style>';
                        break;
                    }
                }
            }
            mysqli_close($conn);
            ?>
        </div>
<!--        <script>-->
<!--            document.getElementById('car-pluspp').addEventListener('click', () => {-->
<!--                this.className = 'fas fa-2x fa-check';-->
<!--                this.style.color='green';-->
<!--                // cartes[i].parentElement.parentElement.querySelector('a').href+='1';-->
<!--                window.location.href=-->
<!--            });-->
<!--        </script>-->
        <div class="desc">
            <?php
            $s = "127.0.0.1";
            $u = "root";
            $p = "";
            $d = "projectcsdl";

            // Create connection
            $conn = mysqli_connect($s, $u, $p, $d);
            if (!$conn) {
//                echo "Connection error: " .mysqli_connect_error() ."<br />";
                die();
            }
            $query0 = "SELECT * FROM projectcsdl.product";
            $result0 = mysqli_query($conn, $query0);
            if ($result0) {
                $pro_id = "";
                if (isset($_GET["pro_id"])) {
                    $pro_id = $_GET["pro_id"];
                }
                while ($row = mysqli_fetch_assoc($result0)) {
                    if ($row["pro_id"] === $pro_id) {
                        echo 'Tên: ' .$row["pro_name"] .'<br />';
                        echo 'Loại: ' .$row["pro_type"] .'<br />';
                        echo 'Công ty: ' .$row["com_id"] .'<br />';
                        echo 'Giá: ' .$row["pro_price"] .'<br />';
                        echo 'Mô tả sản phẩm: <span>' .$row["pro_desc"] .'</span>';
                        break;
                    }
                }
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>
</body>
</html>