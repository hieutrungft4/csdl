<?php
session_start();
include "../inc/header-main.php";
if (empty($_SESSION["username"]) && empty($_SESSION["password"])) {
    echo '<script>alert("Vui lòng đăng nhập!")</script>';
//    echo '<script>location.prototype.href"../login/login.php"</script>';
    header("Location: ../login/login.php");
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (!isset($_SESSION['cnt'])) {
    $_SESSION['cnt'] = 1;
}
if (isset($_GET["p_id"]) && !isset($_GET["type"])) {
    if (isset($_GET['ckd'])) {
        if ($_GET['ckd'] === '1') {
            $_SESSION['cart'][$_GET["p_id"]] = '1';
        }
        else {
            $_SESSION['cart'][$_GET["p_id"]] = '0';
        }
    }
    else {
        $_SESSION['cart'][$_GET["p_id"]] = '0';
    }
}
//if (isset($_GET["p_id"]) && isset($_GET["type"])) {
//    if (isset($_GET['ckd'])) {
//        if ($_GET['ckd'] === '1') {
//            $_SESSION['cart'][strval(count($_SESSION['cart'])-(int)$_GET["p_id"]+1)] = '1';
//        }
//        else {
//            $_SESSION['cart'][strval(count($_SESSION['cart'])-(int)$_GET["p_id"]+1)] = '0';
//        }
//    }
//    else {
//        $_SESSION['cart'][strval(count($_SESSION['cart'])-(int)$_GET["p_id"]+1)] = '0';
//    }
//}
?>
<?php
//if (!isset())
global $query01;
$query01 = "SELECT * FROM projectcsdl.product ORDER BY pro_id ASC";
?>
    <div class="spacer"></div>
    <div class="main-right" style="box-sizing: border-box; font-family: Arial">
        <div class="box-control" style="padding: 10px">
            <div class="type-control" style="outline: none; ">
                <label style="position: relative; bottom: -6px">Loại: </label>
                <select class="sl-type" style="width: 60px; height: 30px; outline: none; text-align: center">
                    <option>All</option>
                    <?php
                    $s = "127.0.0.1";
                    $u = "root";
                    $p = "";
                    $d = "projectcsdl";

                    // Create connection
                    $conn = mysqli_connect($s, $u, $p, $d);
                    if (!$conn) {
                        echo "Connection error: " .mysqli_connect_error() ."<br />";
                        die();
                    }
                    $query = "SELECT DISTINCT pro_type FROM projectcsdl.product ORDER BY pro_id ASC";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option>' .$row["pro_type"] .'</option>';
                        }
                    }
//                    echo '<style>';
//                    echo '.sl-type > option {outline: none; text-align: center}';
//                    echo '.sl-type > option:hover {cursor: pointer; background-color; gray}';
//                    echo '</style>';
                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            <div class="price-control">
                <label style="position: relative; bottom: -4px">Giá: </label>
                <input type="text" name="min-price" id="min-price" class="input-control" value="0" /> -->
                <input type="text" name="max-price" id="max-price" class="input-control" value="5000000" />
            </div>
            <style>
                .input-control {
                    outline: none;
                    width: 70px;
                    height: 30px;
                    line-height: 25px;
                }
                .sl-type > option {
                    outline: none;
                    text-align: center;
                }
                .sl-type > option:hover {
                    cursor: pointer;
                    background-color: gray;
                }
            </style>
            <div class="sort-control">
                <div class="asc">
                    <label for="asc">Tăng dần</label>
                    <input checked type="radio" name="sort" id="asc" style="position: relative; left: 40px; bottom: -1px" />
                </div>
                <div class="desc">
                    <label for="desc">Giảm dần</label>
                    <input type="radio" name="sort" id="desc" style="position: relative; left: 38px; bottom: -1px; margin-top: 10px" />
                </div>
            </div>
            <div class="filter">
                <button type="button" id="btn-filter">Tìm kiếm</button>
            </div>
        </div>
        <script>
            document.getElementById('btn-filter').addEventListener('click', () => {
                let min_price = document.getElementById('min-price').value.trim().toString();
                let max_price = document.getElementById('max-price').value.trim().toString();
                let optsEle = document.querySelector('.sl-type').options;
                let indexOpt = document.querySelector('.sl-type').selectedIndex;
                let pro_type = optsEle[indexOpt].value.trim().toLowerCase().toString();
                let asc = document.getElementById('asc');
                let sort = 'asc';
                if (asc.checked == true) {
                    sort = 'asc';
                }
                else {
                    sort = 'desc';
                }
                window.location.href="main-page.php?type="+pro_type+"&min_price="+min_price+"&max_price="+max_price+"&sort="+sort;
            });
        </script>
    </div>
    <div class="main-left">
        <?php
        $s = "127.0.0.1";
        $u = "root";
        $p = "";
        $d = "projectcsdl";

        // Create connection
        $conn = mysqli_connect($s, $u, $p, $d);
        if (!$conn) {
            echo "Connection error: " .mysqli_connect_error() ."<br />";
            die();
        }
//        $query01 = "SELECT * FROM projectcsdl.product ORDER BY pro_id ASC";
        if (isset($_GET["type"]) && isset($_GET["min_price"]) && isset($_GET["max_price"]) && isset($_GET["sort"])) {
            $_SESSION["cnt"] = 1;
            if (strval($_GET["type"]) !== 'all') {
                $query01 = "SELECT * FROM projectcsdl.product WHERE pro_price >= '" . $_GET["min_price"] . "' AND pro_price <= '" . $_GET["max_price"] ."' AND pro_type='" .$_GET["type"] ."' ORDER BY pro_price " . $_GET["sort"];
            }
            else {
                $query01 = "SELECT * FROM projectcsdl.product WHERE pro_price >= '" . $_GET["min_price"] ."' AND pro_price <= '" .$_GET["max_price"] ."' ORDER BY pro_price " .$_GET["sort"];
            }
            unset($_GET["type"]);
            unset($_GET["min_price"]);
            unset($_GET["max_price"]);
            unset($_GET["sort"]);
        }
        $result0 = mysqli_query($conn, $query01);
        try {
            if ($result0) {
                while ($row = mysqli_fetch_assoc($result0)) {
                    if (strval($row["cus_id"]) === '0') {
                        echo '<div class="box-pro" style="width: 240px; height: 320px; background-color: antiquewhite; margin: 10px; display: flex; flex-direction: column">';
                        echo '<a href="../desc-pr/desc-pro.php?pro_id=' .$row["pro_id"] .'&checked=' .(isset($_GET['p_id']) ? $_SESSION['cart'][$row["pro_id"]] : '0');
                        echo '" style="color: black; text-decoration: none">';
                        if ($_SESSION['cnt'] > 0) {
                            $_SESSION['cart'][$row["pro_id"]] = '0';
                        }
                        echo '<div style="width: 200px; height: 200px; margin: 10px auto;">';
                        echo '<img width="200" src="../';
                        echo $row["pro_image"];
                        echo '" alt="nothing" />';
                        echo '</div>';
                        echo '<div style="display: flex; justify-content: center">';
                        echo '<div style="width: 200px; text-align: center; line-height: 18px; font-size: 17px; overflow: hidden">';
                        echo '<p id="box-image">';
                        echo $row["pro_name"];
                        echo '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div style="display: flex; justify-content: center; margin-top: 5px">';
                        echo '<div style="width: 200px; height: 25px; display: flex; justify-content: center">';
                        echo '<p style="align-self: center; font-size: 22px">';
                        echo $row["pro_price"];
                        echo '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                        echo '<div class="con-icon" style="background-color: antiquewhite; width: 240px; display: flex; justify-content: center">';
                        if (isset($_GET["p_id"])) {
                            if ($_SESSION['cart'][$row["pro_id"]] === '1') {
                                echo '<i id="' .$row["pro_id"] .'" ' .'class="fas fa-2x fa-check" style="color: green; position: relative; bottom: -10px"></i></div>';
                            }
                            else {
                                echo '<i id="' .$row["pro_id"] .'" ' .'class="fas fa-2x fa-cart-plus" style="position: relative; bottom: -10px"></i></div>';
                            }
                        }
                        else {
                            echo '<i id="' .$row["pro_id"] .'" ' .'class="fas fa-2x fa-cart-plus" style="position: relative; bottom: -10px"></i></div>';
                        }
//                    echo '<i id="' .$row["pro_id"] .'" ' .'class="fas fa-2x fa-cart-plus" style="position: relative; bottom: -10px"></i></div>';
                        echo '<style>.con-icon > i:hover {color: #9ccdbc; cursor: pointer}</style>';
                        echo '</div>';
                        echo '<style> .main-left > div {transition: 1s} </style>';
                        echo '<style> .main-left > div:hover {transform: scale(1.06)} </style>';
                    }
                }
            }
        } catch (Exception $e) {
            echo "Message: " .$e->getMessage();
        }
        $_SESSION['cnt'] = 0;
        mysqli_close($conn);
        ?>
    </div>
</div>
</body>
<script> // handle click to product
    var cartes = document.querySelectorAll('.con-icon > i');
    for (let i = 0; i < cartes.length; ++i) {
        cartes[i].addEventListener('click', () => {
            if (cartes[i].getAttribute('class') === 'fas fa-2x fa-cart-plus') {
                cartes[i].className = 'fas fa-2x fa-check';
                cartes[i].style.color='green';
                // cartes[i].parentElement.parentElement.querySelector('a').href+='1';
                window.location.href="main-page.php?p_id="+cartes[i].id.toString()+'&ckd=1';
            } else {
                cartes[i].className = 'fas fa-2x fa-cart-plus';
                cartes[i].style.color='black';
                // cartes[i].parentElement.parentElement.querySelector('a').href+='0';
                window.location.href="main-page.php?p_id="+cartes[i].id.toString();
            }
        });
    }
</script>
</html>