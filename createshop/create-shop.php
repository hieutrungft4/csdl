<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="style-create-shop.css" />
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
</head>
<body>
<div class="contain">
    <form id="form-1" method="post" action="insert_db_shop.php">
        <div class="form-group-1">
            <h1 class="header">Thông tin cửa hàng</h1>
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
            <input type="text" name="address" id="address" class="info-cus" placeholder="Tên cửa hàng" />
        </div>
        <div class="form-group-6">
            <input type="text" name="e-mail" id="e-mail" class="info-cus" placeholder="Mã quản lý" />
        </div>
        <div class="line-2"></div>
        <div class="form-group-7">
            <input type="submit" name="btn-save" id="btn-save" value="Lưu" />
        </div>
    </form>
</div>
</body>
</html>