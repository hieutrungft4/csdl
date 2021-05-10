<?php include_once "../inc/admin_header.php"?>
<link rel="stylesheet" href="../inc/style-admin-header.css" />
<link rel="stylesheet" href="../../fontawesome/css/all.min.css" />
<link rel="stylesheet" href="css-remove-product.css" />

<?php
if (isset($_GET["_id"])) {
    $_id = strval($_GET["_id"]);
    $serverName = "127.0.0.1";
    $uName = "root";
    $uPw = "";
    $dbName = "projectcsdl";
    $conn = mysqli_connect($serverName, $uName, $uPw, $dbName);
    $query = "";
    mysqli_close($conn);
}
?>
<div class="main">
    <table width="100%">
        <thead>
        <tr style="height: 50px; font-size: 20px">
            <th style="width: 50px">ID</th>
            <th>Tên</th>
            <th style="width: 70px">Loại</th>
            <th style="width: 140px">Giá</th>
            <th>Ảnh</th>
            <th style="width: 100px">Tùy chọn</th>
        </tr>
        </thead>
        <tbody>
        <!-- Edit product -->
        <?php
        $serverName = "127.0.0.1";
        $uName = "root";
        $uPw = "";
        $dbName = "projectcsdl";
        $conn = mysqli_connect($serverName, $uName, $uPw, $dbName);
        $query = "SELECT * FROM projectcsdl.product ORDER BY pro_id ASC";
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
                echo '<img width="150" src="../../';
                echo $row["pro_image"];
                echo '" alt="nothing" />';
                echo '</div></td>';

                if (strval($row["cus_id"]) === '0') {
                    echo '<td><i id="' .$row["pro_id"] .'" class="fas fa-trash-alt"></i></td>';
                }
                else {
                    echo '<td></td>';
                }
                echo '</tr>';
            }
        }
        mysqli_close($conn);
        ?>
        </tbody>
    </table>
</div>
<div style="width: 85%; display: flex; flex-direction: row-reverse; margin: 10px auto">
    <button type="button" id="btn-change">Lưu thay đổi</button>
</div>
</div> <!-- close tag (className='contain') -->
</body>
<script>
    var trs = document.querySelectorAll('tbody > tr');
    for (let i = 0; i < trs.length; ++i) {
        var x = trs[i].querySelectorAll('td');
        if (x[x.length-1].querySelector('i')) {
            x[x.length-1].querySelector('i').addEventListener('click', () => {
                window.location.href="remove-product.php?_id="+x[x.length-1].querySelector('i').id.toString();
            });
        }
    }
</script>
</html>
