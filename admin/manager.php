<?php
include_once "./inc/admin_header.php";
if (empty($_SESSION["username"]) && empty($_SESSION["password"])) {
    echo '<script>alert("Vui lòng đăng nhập!")</script>';
    header("Location: ../login/login.php");
}
?>
<link rel="stylesheet" href="./inc/style-admin-header.css" />
<link rel="stylesheet" href="style-manager.css" />
<div class="main">
    <div class="box-func">
        <div class="add-product">Thêm sản phẩm</div>
        <div class="delivery">Vận chuyển</div>
        <div class="statistical">Chỉnh sửa hồ sơ</div>
    </div>
</div>
</div>
</body>
<script>
    document.querySelector('.add-product').addEventListener('click', () => {
        window.location.href="./add-product/add-product.php";
    });
    document.querySelector('.delivery').addEventListener('click', () => {
        window.location.href="./delivery/shipper.php";
    });
    document.querySelector('.statistical').addEventListener('click', () => {
        window.location.href="../createshop/create-shop.php";
    });
</script>
</html>