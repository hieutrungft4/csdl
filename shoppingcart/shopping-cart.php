<?php session_start(); ?>
<?php
if (!isset($_SESSION['payment'])) {
    $_SESSION['payment'] = 0;
}
if (!isset($_SESSION["temp"])) {
    $_SESSION["temp"] = 0;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="style-shopping-cart.css" />
</head>
<style>
    table, th, td {
        text-align: center;
    }
    html, body {
        background-color: #bc84ee;
        display: flex;
        justify-content: center;
    }
    .spacer {
        height: 1px;
        background-color: #bcbcf3;
        margin: 10px auto 20px;
    }
    .button-vali {
        display: flex;
        justify-content: center;
    }
    #btn-vali {
        background-color: #bc84ee;
    }
    #btn-vali:hover {
        background-color: #2828e8;
        cursor: pointer;
    }
</style>
<body>
<div class="contain">
    <div>
        <h1 style="margin-top: 50px; margin-bottom: 50px; text-align: center; font-size: 40px">Thanh toán</h1>
    </div>
    <div>
        <table style="width: 100%">
            <thead>
            <tr>
                <th style="width: 100px">ID</th>
                <th>Tên</th>
                <th style="width: 155px">Giá</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $serverName = "127.0.0.1";
            $uName = "root";
            $uPw = "";
            $dbName = "projectcsdl";
            $conn = mysqli_connect($serverName, $uName, $uPw, $dbName);
            $query = "SELECT * FROM projectcsdl.product";
            $result = mysqli_query($conn, $query);
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($value === '1') {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if (strval($row["pro_id"]) === strval($key)) {
                                echo '<tr>';
                                echo '<td>' .$key .'</td>';
                                echo '<td>' .$row["pro_name"] .'</td>';
                                echo '<td>' .$row["pro_price"] .'</td>';
                                echo '</tr>';
                                $_SESSION['temp'] += (float)$row["pro_price"];
                                break;
                            }
                        }
                    }
                }
            }

            mysqli_close($conn);
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="2" style="font-weight: bold">Tổng</td>
                <?php echo '<td style="font-weight: bold">' .$_SESSION['temp'] .'</td>'; $_SESSION["payment"] += $_SESSION["temp"]; $_SESSION["temp"] = 0; ?>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="spacer"></div>
    <div class="button-vali">
        <button type="button" id="btn-vali" style="outline: none; font-size: 30px; border: 1px solid">Xác nhận</button>
    </div>
</div>
</body>
<script>
    document.getElementById('btn-vali').addEventListener('click', () => {
        window.location.href="insert_db.php";
    });
</script>
</html>