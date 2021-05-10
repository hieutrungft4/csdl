<!DOCTYPE html>
<html>
<head>
    <title>Website</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style-main-page.css" />
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
</head>
<body>
<div class="contain">
    <div class="header">
        <div class="box-info">
            <?php
            if (!empty($_SESSION["username"])) {
                echo '<i id="sign-out" onclick="logout()" class="fas fa-1x fa-sign-out-alt" style="margin-left: 3px; margin-right: 70px"></i>';
                echo '<style> #sign-out:hover {color: mediumvioletred; cursor: pointer} </style>';
                echo '<span style="line-height: 30px; font-size: 18px">Hi, ' .$_SESSION["username"] .'</span>';
                echo '<i id="shop-cart" style="margin-right: 10px" class="fas fa-shopping-cart"></i>';
                echo '<style> #shop-cart:hover {color: #2828e8; cursor: pointer} </style>';
                echo '<a style="text-decoration: none; color: black; margin-right: 10px" href="../myproduct/myorder.php"><p>My product</p></a>';
                if ($_SESSION["username"] === 'admin') {
                    echo '<a style="text-decoration: none; color: black" href="../admin/manager.php"><p style="margin-right: 10px">Admin</p></a>';
                }
                else {
                    echo '<a style="display: none; text-decoration: none; color: black" href="../admin/manager.php"><p style="margin-right: 10px">Admin</p></a>';
                }
            }
            else {
                echo '<span><a href="../login/login.php" id="login" class="account">Login</a></span>';
                echo '<span><a href="../signup/signup.php" id="sign-up" class="account">Sign up</a></span>';
            }
            ?>
        </div>
        <div class="box-search">
            <div class="search">
                <input type="text" name="search-pro" id="search-pro" placeholder="Search products" />
            </div>
            <i id="search-icon" class="fas fa-1x fa-search"></i>
        </div>
    </div>
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