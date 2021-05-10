<?php include_once "../admin/inc/admin_header.php" ?>
<link rel="stylesheet" href="../admin/inc/style-admin-header.css" />
<link rel="stylesheet" href="../fontawesome/css/all.min.css" />
<link rel="stylesheet" href="style-myorder.css" />
<script>
    function logout() {
        location.href=" ../login/login.php";
    }
</script>
<?php
$_SESSION["sum"] = 0;
?>
<div class="main">
    <table width="100%">
        <thead>
        <tr style="height: 50px; font-size: 20px">
            <th style="width: 50px">ID</th>
            <th>Tên</th>
            <th style="width: 70px">Loại</th>
            <th style="width: 120px">Công ty</th>
            <th>Ảnh</th>
            <th style="width: 150px">Giá</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $serverName = "127.0.0.1";
        $uName = "root";
        $uPw = "";
        $dbName = "projectcsdl";
        $conn = mysqli_connect($serverName, $uName, $uPw, $dbName);
        $query = "SELECT * FROM projectcsdl.product WHERE product.cus_id IN (SELECT account.cus_id FROM projectcsdl.account WHERE acc_user='" .strval($_SESSION["username"]) ."')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' .$row["pro_id"] .'</td>';
                echo '<td>' .$row["pro_name"] .'</td>';
                echo '<td>' .$row["pro_type"] .'</td>';
                echo '<td>' .$row["pro_price"] .'</td>';

                // view image
                echo '<td><div style="width: 150px; height: 150px; margin: 10px auto;">';
                echo '<img width="150" src="../';
                echo $row["pro_image"];
                echo '" alt="nothing" />';
                echo '</div></td>';
                echo '<td>' .$row["pro_price"] .'</td>';
                $_SESSION["sum"] += (float)$row["pro_price"];
            }
        }
        mysqli_close($conn);
        ?>
        </tbody>
        <tfoot>
        <tr style="height: 50px; font-size: 20px; font-weight: bold">
            <td colspan="5">Thanh toán</td>
            <?php echo '<td>' .$_SESSION["sum"] .'</td>'; ?>
        </tr>
        </tfoot>
    </table>
</div>
</div>
</body>
</html>
