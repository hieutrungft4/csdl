<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style-info-cus.css" />
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
</head>
<body>
<div class="contain">
    <form action="insert_info_cus.php" method="post" id="form-1">
        <div class="form-group-1">
            <h1 class="header">Thông tin đăng ký</h1>
        </div>
        <div class="form-group-2">
            <div class="line-1"></div>
        </div>
        <div class="form-group-3">
            <input type="text" name="fullname" id="fullname" class="info-cus" placeholder="Họ tên" />
        </div>
        <div class="form-group-4">
            <input type="text" name="mobile" id="mobile" class="info-cus" placeholder="Số điện thoại" />
        </div>
        <div class="form-group-5">
            <input type="text" name="address" id="address" class="info-cus" placeholder="Địa chỉ" />
        </div>
        <div class="form-group-6">
            <input type="text" name="e-mail" id="e-mail" class="info-cus" placeholder="Email" />
        </div>
        <div class="line-2"></div>
        <div class="form-group-7">
            <input type="submit" name="btn-save" id="btn-save" value="Lưu" />
        </div>
    </form>
</div>
</body>
</html>