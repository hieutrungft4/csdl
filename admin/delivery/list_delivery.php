<?php include_once "../inc/admin_header.php"; ?>
<link rel="stylesheet" href="../inc/style-admin-header.css" />
<link rel="stylesheet" href="../../fontawesome/css/all.min.css" />
<style>
    table, th, td {
        text-align: center;
        border: 1px solid black;
        border-collapse: collapse;
    }
    .main {
        width: 80vw;
        height: 100vh;
        background-color: antiquewhite;
    }
</style>
<div class="main" style="margin: 50px auto">
    <table style="width: 100%; background-color: #bcbcf3">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th style="width: 200px">Họ tên</th>
            <th style="width: 150px">Số điện thoại</th>
            <th>Địa chỉ</th>
            <th style="width: 100px">Ngày nhận đơn</th>
            <th style="width: 100px;">Ngày vận chuyển</th>
            <th style="width: 80px">Status</th>
        </tr>
        </thead>
        <tbody>
        <!--    add from user-->
        <?php
        $serverName = "127.0.0.1";
        $uName = "root";
        $uPw = "";
        $dbName = "projectcsdl";
        $conn = mysqli_connect($serverName, $uName, $uPw, $dbName);
        $query = "SELECT * FROM projectcsdl.delivery";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' .$row["del_id"] .'</td>';
                echo '<td>' .$row["del_name"] .'</td>';
                echo '<td>' .$row["del_mobile"] .'</td>';
                echo '<td>' .$row["del_address"] .'</td>';
                echo '<td>' .$row["orderDate"] .'</td>';
                echo '<td>' .$row["shippedDate"] .'</td>';
                echo '<td>' .$row["status"] .'</td>';
            }
        }
        mysqli_close($conn);
        ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
