<?php
include_once "../inc/admin_header.php";
?>
<link rel="stylesheet" href="../inc/style-admin-header.css" />
<link rel="stylesheet" href="style-shipper.css" />
<link rel="stylesheet" href="../../fontawesome/css/all.min.css" />
<div class="main">
    <form action="del_insert_db.php" method="post" id="form-1">
        <div class="form-group-1">
            <h1 class="header1">Thông tin đăng ký</h1>
        </div>
        <div class="form-group-2">
            <div class="line-1"></div>
        </div>
        <div class="form-group-3">
            <input type="text" name="fullname" id="fullname" class="info-del" placeholder="Họ tên" />
        </div>
        <div class="form-group-4">
            <input type="text" name="mobile" id="mobile" class="info-del" placeholder="Số điện thoại" />
        </div>
        <div class="form-group-5">
            <input type="text" name="address" id="address" class="info-del" placeholder="Địa chỉ" />
        </div>
        <div class="form-group-6">
            <input type="text" name="status" id="status" class="info-del" placeholder="Status" />
        </div>

        <div class="line-2"></div>
        <div class="form-group-7">
            <input type="submit" name="btn-save" id="btn-save" value="Lưu" />
        </div>
        <div class="line-3" style="margin-top: 20px; height: 0; background-color: white"></div>
        <div class="form-group-8">
            <a href="list_delivery.php" style="text-decoration: none; font-family: 'Arial'; font-size: 15px">Danh sách vận chuyển</a>
        </div>
    </form>
</div>
</div>
</body>
</html>