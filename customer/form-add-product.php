<!DOCTYPE html>

<html>
<head>
    <title>Add product</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style-form-add-pro.css">
</head>

<body>
<div class="main">
    <form action="" class="form-1" method="POST">
        <div class="form-header-group">
            <div class="form-group-1">
                <a href="../main-page.php">
                    <i id="back-icon" class="far fa-2x fa-arrow-alt-circle-left" style="position: relative; left: -285px; top: -30px;"></i>
                </a>
                <h1 id="header-1" class="header">Purchase Order</h1>
                <p id="header-2" class="header">What would you like to purchase?</p>
            </div>
        </div>

        <div class="line-1"></div>

        <div class="form-group-2">
            <div class="full-name">
                <label for="fullname" id="label-fullname">Fullname</label>
                <input type="text" name="fullname" id="fullname" class="input">
            </div>
        </div>

        <div class="form-group-3">
            <div class="address">
                <label for="address" id="label-address">Shipping Address</label>
                <input type="text" name="address" id="address" class="input">
            </div>
        </div>

        <div class="form-group-4">
            <div class="e-mail">
                <label for="e-mail" id="label-e-mail">E-mail</label>
                <input type="email" name="e-mail" id="e-mail" class="input">
            </div>
        </div>

        <div class="form-group-5">
            <div class="mobile">
                <label for="mobile-number">Mobile number</label>
                <input type="text" name="mobile-number" id="mobile-number" class="input">
            </div>
        </div>

        <div class="line-2"></div>

        <div class="form-group-6">
            <div class="next">
                <button type="button" id="next">Next</button>
            </div>
        </div>
    </form>
</div>
</body>
<script src="validator-form-add-pro.js"></script>
<!-- <script src="./jquery/jQuery.js"></script> -->
</html>